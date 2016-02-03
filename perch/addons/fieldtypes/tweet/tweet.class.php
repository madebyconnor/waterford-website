<?php
/**
 * A field type to embed a single tweet
 *
 * @package default
 * @author Rachel Andrew
 */
class PerchFieldType_tweet extends PerchAPI_FieldType
{

    public function add_page_resources()
    {
        if (!class_exists('PerchTwitter')) {
            require_once(PERCH_PATH.'/addons/apps/perch_twitter/PerchTwitter.class.php');
        }
    }

    /**
     * Output the form fields for the edit page
     *
     * @param array $details 
     * @return void
     * @author Rachel Andrew
     */
    public function render_inputs($details=array())
    {
       $id = $this->Tag->input_id();
        $val = '';
        
        if (isset($details[$id]) && $details[$id]!='') {
            $json = $details[$id];
            $val  = $json['status_id'];
            PerchUtil::debug($json); 
        }else{
            $json = array();
        }
        
        $s = $this->Form->text($this->Tag->input_id(), $val);
        
        if (isset($json['tweetHTML'])) {
            $API = new PerchAPI(1.0, 'perch_twitter');
            $Lang = $API->get('Lang');
            $s.= '<div class="preview" style="color: #000"><strong>'.$Lang->get('Tweet text').':</strong> '.$json['tweetHTML'].'</div>';
        }
        
        return $s;
    }
    
    
    /**
     * Read in the form input, prepare data for storage in the database.
     *
     * @param string $post 
     * @param object $Item 
     * @return void
     * @author Rachel Andrew
     */
    public function get_raw($post=false, $Item=false) 
    {
        $id = $this->Tag->id();
        $template = $this->Tag->template();

        if ($post===false) {
            $post = $_POST;
        }
        
        if (isset($post[$id])) {
            $this->raw_item = trim($post[$id]);

            $status_id = $this->raw_item;

            if (!is_numeric($status_id)) {
                $status_id = $this->_find_status_from_url($status_id);
            }

            if (is_object($Item)){
                
                $json = PerchUtil::json_safe_decode($Item->itemJSON(), true);
                if (isset($json[$id]) && isset($json[$id]['status_id'])) {
                    if ($status_id == $json[$id]['status_id']) {
                      // Status ID hasn't changed, so return what we've got.
                      return $json[$id];
                    }
                }
                
            }

            $tweet = $this->get_status($status_id);

            $PerchTwitter  = new PerchTwitter();

            $data = array();

            $data['tweetUser']         = trim($tweet->user->screen_name);
            $data['tweetUserRealName'] = trim($tweet->user->name);
            $data['tweetUserAvatar']   = trim($tweet->user->profile_image_url);
            $data['tweetDate']         = date('Y:m:d H:i:s', strtotime($tweet->created_at));
            $data['tweetTimeOffset']   = (int) $tweet->user->utc_offset;
            $data['tweetText']         = trim($tweet->text);
            $data['tweetAccount']      = trim($tweet->user->id);
            $data['tweetTwitterID']    = $status_id;
            $data['tweetHTML']         = $PerchTwitter->get_tweet_html($tweet);
            $data['tweetType']         = 'single';
            $data['status_id']         = $status_id;
            $data['template']          = $template;
            
            return $data;

        }

        return false;
    }
    
    /**
     * Take the raw data input and return process values for templating
     *
     * @param string $raw 
     * @return void
     * @author Rachel Andrew
     */
    public function get_processed($raw=false)
    {    
        if (is_array($raw)) {
            
            $item = $raw;

            // has the user set a template? If so use it, otherwise use the default tweet template.
            if(isset($item['template']) && $item['template']!='') {
                $template = $item['template'];
            } else {
                $template = 'twitter/tweet.html';
            }
            $API  = new PerchAPI(1.0, 'perch_twitter');
            $Template = $API->get('Template');

            $Template->set($template, 'twitter');
            
            $this->processed_output_is_markup = true;
            
            return $Template->render($item);
            

            
        }
        return $raw;
    }
    
	
	/**
	 * Get the individual status using the ID
	 *
	 * @param string $statusID A Twitter Status ID
	 * @return array Assoc array of status details
	 * @author Rachel Andrew
	 */
	private function get_status($statusID)
	{
		if (!class_exists('tmhOAuth')) {
            require(PERCH_PATH.'/addons/apps/perch_twitter/tmhOAuth/tmhOAuth.php');
            require(PERCH_PATH.'/addons/apps/perch_twitter/tmhOAuth/tmhUtilities.php');
        }
        if (!class_exists('TwitterSettings')) {
            require(PERCH_PATH.'/addons/apps/perch_twitter/PerchTwitter_Settings.class.php');
            require(PERCH_PATH.'/addons/apps/perch_twitter/PerchTwitter_Setting.class.php');
        }

        $TwitterSettings = new PerchTwitter_Settings();
        $CurrentSettings = $TwitterSettings->find();

        $tmhOAuth = new tmhOAuth(array(
            'consumer_key'    => $CurrentSettings->settingTwitterKey(),
            'consumer_secret' => $CurrentSettings->settingTwitterSecret(),
            'user_token'      => $CurrentSettings->settingTwitterToken(),
            'user_secret'     => $CurrentSettings->settingTwitterTokenSecret()
        ));

        $code = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/show.json'), array(
                'id'=>$statusID
            ));

        if ($code == 200) {
          $tweet = PerchUtil::json_safe_decode($tmhOAuth->response['response']);
          
          return $tweet;

        } 
		
		return false;
	}

    /**
     * Get the value to be used for searching
     *
     * @param string $raw 
     * @return void
     * @author Drew McLellan
     */
    public function get_search_text($raw=false)
    {
        if ($raw===false) $raw = $this->get_raw();
        if (!PerchUtil::count($raw)) return false;

        if (isset($raw['title'])) return $raw['title'];

        return false;
    }

    private function _find_status_from_url($url) 
    {
        $pattern = '#status/([0-9]+)#';
        if (preg_match($pattern, $url, $match)) {
            return $match[1];
        }

        return $url;
    }


}
