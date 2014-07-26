<?php


class qa_simple_admanager {

	function allow_template($template)
	{
		return ($template!='admin');
	}

	function option_default($option) {

		switch($option) {
  
            case 'q2a_enable_admanager':
                return true;

			case 'q2a_ad_after_question':
                return true;

			case 'q2a_ad_after_menu_bar':
                return true;

			case 'q2a_ad_after_all_answers':
                return true;

			case 'q2a_ad_after_all_questions':
                return true;
            
			default:
				return null;
		}	

	}
	
	function admin_form(&$qa_content)
	{

		$ok = null;
		if (qa_clicked('np_q_save_button')) {
			
			qa_opt('q2a_enable_admanager',(bool)qa_post_text('q2a_enable_admanager'));            
			qa_opt('q2a_ad_after_question',(bool)qa_post_text('q2a_ad_after_question'));
			qa_opt('q2a_ad_after_menu_bar',(bool)qa_post_text('q2a_ad_after_menu_bar'));
			qa_opt('q2a_ad_after_all_answers',(bool)qa_post_text('q2a_ad_after_all_answers'));
			qa_opt('q2a_ad_after_all_questions',(bool)qa_post_text('q2a_ad_after_all_questions'));
			qa_opt('enable_html_ad_code',(bool)qa_post_text('enable_html_ad_code'));
			qa_opt('q2a_html_ad_codebox', qa_post_text('q2a_html_ad_code_field'));            

			$ok = qa_lang('admin/options_saved');
		}
        
		qa_set_display_rules($qa_content, array(
				
			'q2a_html_ad_code_display' => 'enable_html_ad_code',
				
		));

		$fields = array();

		$fields[] = array(
			'label' => 'Enable admanager',
			'tags' => 'NAME="q2a_enable_admanager"',
			'value' => qa_opt('q2a_enable_admanager'),
			'type' => 'checkbox',
		);
        
		$fields[] = array(
			'label' => 'Ad after Question',
			'tags' => 'NAME="q2a_ad_after_question"',
			'value' => qa_opt('q2a_ad_after_question'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'label' => 'Ad after Menu Bar',
			'tags' => 'NAME="q2a_ad_after_menu_bar"',
			'value' => qa_opt('q2a_ad_after_menu_bar'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'label' => 'Ad after All Answers',
			'tags' => 'NAME="q2a_ad_after_all_answers"',
			'value' => qa_opt('q2a_ad_after_all_answers'),
			'type' => 'checkbox',
		);
		
		$fields[] = array(
			'label' => 'Ad after All Questions',
			'tags' => 'NAME="q2a_ad_after_all_questions"',
			'value' => qa_opt('q2a_ad_after_all_questions'),
			'type' => 'checkbox',
		);
        
		$fields[] = array(
			'label' => 'Ad code',
			'type' => 'checkbox',
			'value' => qa_opt('enable_html_ad_code'),
			'tags' => 'NAME="enable_html_ad_code" ID="enable_html_ad_code"',
		);
		
		$fields[] = array(
			'id' => 'q2a_html_ad_code_display',
			'label' => 'Paste HTML Ad Code in this box',
			'type' => 'textarea',
			'value' => qa_opt('q2a_html_ad_codebox'),
			'tags' => 'NAME="q2a_html_ad_code_field"',
            'rows' => 3,
		);
        

		$fields[] = array(
			'type' => 'blank',
		);


		return array(
			'ok' => ($ok && !isset($error)) ? $ok : null,
			
			'fields' => $fields,
			
			'buttons' => array(
				array(
				'label' => qa_lang_html('main/save_button'),
				'tags' => 'NAME="np_q_save_button"',
				),
			),
		);
	}

}
/*
	Omit PHP closing tag to help avoid accidental output
*/
