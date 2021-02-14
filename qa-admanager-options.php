<?php


class pt_qa_simple_admanager {

	function allow_template($template)
	{
		return ($template!='admin');
	}


	function option_default($option) {

                switch($option) {
			case 'pt_q2a_ad_css': return '.sidebar-ad{position:fixed; left:0; vertical-align: top; height: 400px; width:150px;} .adcode{margin:10px;}@media only screen and (max-width: 1499px) {.sidebar-ad{display:none;}  }';
			case 'pt_q2a_ad_after_question_level':
			case 'pt_q2a_ad_before_question_level':
			case 'pt_q2a_ad_after_menu_bar_level':
			case 'pt_q2a_ad_after_all_answers_level':
			case 'pt_q2a_ad_after_all_questions_level':
			case 'pt_q2a_ad_before_all_questions_level':
			case 'pt_q2a_ad_sidebar_level':
			case 'pt_q2a_ad_leftside_level':
			case 'pt_q2a_ad_autoad_level':
                                return QA_USER_LEVEL_SUPER+1;
			case 'pt_q2a_ad_hideaskpage': return 1;
                        default:
                                return null;
                }

        }


	function admin_form(&$qa_content)
	{

		$ok = null;
		if (qa_clicked('pt_q2a_simple_ads_manager_save_button')) 
		{
			qa_opt('pt_q2a_ad_css', qa_post_text('pt_q2a_ad_css'));  
 
			qa_opt('pt_q2a_ad_after_question',(bool)qa_post_text('pt_q2a_ad_after_question'));
			qa_opt('pt_q2a_ad_after_question_codebox', qa_post_text('pt_q2a_ad_after_question_code_field'));   
			qa_opt('pt_q2a_ad_after_question_level',qa_post_text('pt_q2a_ad_after_question_level'));
			
			qa_opt('pt_q2a_ad_before_question',(bool)qa_post_text('pt_q2a_ad_before_question'));
			qa_opt('pt_q2a_ad_before_question_codebox', qa_post_text('pt_q2a_ad_before_question_code_field'));   
			qa_opt('pt_q2a_ad_before_question_level',qa_post_text('pt_q2a_ad_before_question_level'));
			
			qa_opt('pt_q2a_ad_after_menu_bar',(bool)qa_post_text('pt_q2a_ad_after_menu_bar'));
			qa_opt('pt_q2a_ad_after_menu_bar_codebox', qa_post_text('pt_q2a_ad_after_menu_bar_code_field'));   
			qa_opt('pt_q2a_ad_after_menu_bar_level',qa_post_text('pt_q2a_ad_after_menu_bar_level'));
			
			qa_opt('pt_q2a_ad_after_all_answers',(bool)qa_post_text('pt_q2a_ad_after_all_answers'));
			qa_opt('pt_q2a_ad_after_all_answers_codebox', qa_post_text('pt_q2a_ad_after_all_answers_code_field'));   
			qa_opt('pt_q2a_ad_after_all_answers_level',qa_post_text('pt_q2a_ad_after_all_answers_level'));

			qa_opt('pt_q2a_ad_after_first_answer',(bool)qa_post_text('pt_q2a_ad_after_first_answer'));
			qa_opt('pt_q2a_ad_after_first_answer_codebox', qa_post_text('pt_q2a_ad_after_first_answer_code_field'));   
			qa_opt('pt_q2a_ad_after_first_answer_level',qa_post_text('pt_q2a_ad_after_first_answer_level'));
			
			qa_opt('pt_q2a_ad_after_all_questions',(bool)qa_post_text('pt_q2a_ad_after_all_questions'));
			qa_opt('pt_q2a_ad_after_all_questions_codebox', qa_post_text('pt_q2a_ad_after_all_questions_code_field'));   
			qa_opt('pt_q2a_ad_after_all_questions_level',qa_post_text('pt_q2a_ad_after_all_questions_level'));
			
			qa_opt('pt_q2a_ad_before_all_questions',(bool)qa_post_text('pt_q2a_ad_before_all_questions'));
			qa_opt('pt_q2a_ad_before_all_questions_codebox', qa_post_text('pt_q2a_ad_before_all_questions_code_field'));   
			qa_opt('pt_q2a_ad_before_all_questions_level',qa_post_text('pt_q2a_ad_before_all_questions_level'));
			
			qa_opt('pt_q2a_ad_sidebar',(bool)qa_post_text('pt_q2a_ad_sidebar'));
			qa_opt('pt_q2a_ad_sidebar_codebox', qa_post_text('pt_q2a_ad_sidebar_code_field'));   
			qa_opt('pt_q2a_ad_sidebar_level',qa_post_text('pt_q2a_ad_sidebar_level'));
			
			
			qa_opt('pt_q2a_ad_leftside',(bool)qa_post_text('pt_q2a_ad_leftside'));
			qa_opt('pt_q2a_ad_leftside_codebox', qa_post_text('pt_q2a_ad_leftside_code_field'));   
			qa_opt('pt_q2a_ad_leftside_level',qa_post_text('pt_q2a_ad_leftside_level'));
			
			qa_opt('pt_q2a_ad_autoad',(bool)qa_post_text('pt_q2a_ad_autoad'));
			qa_opt('pt_q2a_ad_autoad_codebox', qa_post_text('pt_q2a_ad_autoad_code_field'));   
			qa_opt('pt_q2a_ad_autoad_level',qa_post_text('pt_q2a_ad_autoad_level'));
			
			qa_opt('pt_q2a_ad_hide_categories', qa_post_text('pt_q2a_ad_hide_categories'));   
			qa_opt('pt_q2a_ad_hideaskpage',(bool)qa_post_text('pt_q2a_ad_hideaskpage'));
			
			$ok = qa_lang('admin/options_saved');
		}
        
		qa_set_display_rules($qa_content, array(
				
			'pt_q2a_ad_after_menu_bar_code_display' => 'pt_q2a_ad_after_menu_bar',
			'pt_q2a_ad_before_question_code_display' => 'pt_q2a_ad_before_question',
			'pt_q2a_ad_after_question_code_display' => 'pt_q2a_ad_after_question',
			'pt_q2a_ad_after_first_answer_code_display' => 'pt_q2a_ad_after_first_answer',
			'pt_q2a_ad_after_all_answers_code_display' => 'pt_q2a_ad_after_all_answers',
			'pt_q2a_ad_before_all_questions_code_display' => 'pt_q2a_ad_before_all_questions',
			'pt_q2a_ad_after_all_questions_code_display' => 'pt_q2a_ad_after_all_questions',
			'pt_q2a_ad_sidebar_code_display' => 'pt_q2a_ad_sidebar',
			'pt_q2a_ad_leftside_code_display' => 'pt_q2a_ad_leftside',
			'pt_q2a_ad_autoad_code_display' => 'pt_q2a_ad_autoad',
				
		));

		$showoptions = array(
                                QA_USER_LEVEL_BASIC => "Registered",
                                QA_USER_LEVEL_EXPERT => "Experts",
                                QA_USER_LEVEL_EDITOR => "Editors",
                                QA_USER_LEVEL_MODERATOR =>      "Moderators",
                                QA_USER_LEVEL_ADMIN =>  "Admins",
                                QA_USER_LEVEL_SUPER =>  "Super Admins",
                                QA_USER_LEVEL_SUPER + 1 =>  "Show for EveryOne",
                                );

		$fields = array();
		$fields[] = array(
			'id' => 'pt_q2a_ad_css',
			'label' => 'CSS code',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_css'),
			'tags' => 'NAME="pt_q2a_ad_css"',
            'rows' => 2,
		);		
		
		$fields[] = array(
			'label' => 'Hide Ads on Ask Page (makes reload faster)',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_hideaskpage'),
			'tags' => 'NAME="pt_q2a_ad_hideaskpage" ID="pt_q2a_ad_hideaskpage"',
		);
		$fields[] = array(
			'id' => 'pt_q2a_ad_hide_categories',
			'label' => 'Enter the categories for which no Ad will be shown',
			'type' => 'text',
			'value' => qa_opt('pt_q2a_ad_hide_categories'),
			'tags' => 'NAME="pt_q2a_ad_hide_categories"',
            );
		$fields[] = array(
			'label' => 'Ad after Menu Bar',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_menu_bar'),
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar" ID="pt_q2a_ad_after_menu_bar"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_menu_bar_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 728x15 text/link ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_menu_bar_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_menu_bar_level')],
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar_level" ID="pt_q2a_ad_after_menu_bar_level"',
			'options' => $showoptions
		);

		$fields[] = array(
			'label' => 'Ad before Question',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_before_question'),
			'tags' => 'NAME="pt_q2a_ad_before_question" ID="pt_q2a_ad_before_question"',
		);
		$fields[] = array(
			'id' => 'pt_q2a_ad_before_question_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_before_question_codebox'),
			'tags' => 'NAME="pt_q2a_ad_before_question_code_field"',
            'rows' => 2,
		);
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_before_question_level')],
			'tags' => 'NAME="pt_q2a_ad_before_question_level" ID="pt_q2a_ad_before_question_level"',
			'options' => $showoptions
		);

		$fields[] = array(
			'label' => 'Ad after Question',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_question'),
			'tags' => 'NAME="pt_q2a_ad_after_question" ID="pt_q2a_ad_after_question"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_question_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_question_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_question_code_field"',
            'rows' => 2,
		);
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_question_level')],
			'tags' => 'NAME="pt_q2a_ad_after_question_level" ID="pt_q2a_ad_after_question_level"',
			'options' => $showoptions
		);


		$fields[] = array(
			'label' => 'Ad after All Answers',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_all_answers'),
			'tags' => 'NAME="pt_q2a_ad_after_all_answers" ID="pt_q2a_ad_after_all_answers"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_all_answers_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_all_answers_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_all_answers_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_all_answers_level')],
			'tags' => 'NAME="pt_q2a_ad_after_all_answers_level" ID="pt_q2a_ad_after_all_answers_level"',
			'options' => $showoptions
		);
		$fields[] = array(
			'label' => 'Ad after First Answer',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_first_answer'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer" ID="pt_q2a_ad_after_first_answer"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_first_answer_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_first_answer_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_first_answer_level')],
			'tags' => 'NAME="pt_q2a_ad_after_first_answer_level" ID="pt_q2a_ad_first_answer_level"',
			'options' => $showoptions
		);
		
		$fields[] = array(
			'label' => 'Ad before All Questions',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_before_all_questions'),
			'tags' => 'NAME="pt_q2a_ad_before_all_questions" ID="pt_q2a_ad_before_all_questions"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_before_all_questions_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_before_all_questions_codebox'),
			'tags' => 'NAME="pt_q2a_ad_before_all_questions_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_before_all_questions_level')],
			'tags' => 'NAME="pt_q2a_ad_before_all_questions_level" ID="pt_q2a_ad_before_all_questions_level"',
			'options' => $showoptions
		);

		$fields[] = array(
			'label' => 'Ad after All Questions',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_after_all_questions'),
			'tags' => 'NAME="pt_q2a_ad_after_all_questions" ID="pt_q2a_ad_after_all_questions"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_after_all_questions_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 728x90 banner ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_after_all_questions_codebox'),
			'tags' => 'NAME="pt_q2a_ad_after_all_questions_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_after_all_questions_level')],
			'tags' => 'NAME="pt_q2a_ad_after_all_questions_level" ID="pt_q2a_ad_after_all_questions_level"',
			'options' => $showoptions
		);
		
		$fields[] = array(
			'label' => 'Ad after Sidebar',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_sidebar'),
			'tags' => 'NAME="pt_q2a_ad_sidebar" ID="pt_q2a_ad_sidebar"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_sidebar_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 160x90 text/link ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_sidebar_codebox'),
			'tags' => 'NAME="pt_q2a_ad_sidebar_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_sidebar_level')],
			'tags' => 'NAME="pt_q2a_ad_sidebar_level" ID="pt_q2a_ad_sidebar_level"',
			'options' => $showoptions
		);
		$fields[] = array(
			'label' => 'Ad on left Side',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_leftside'),
			'tags' => 'NAME="pt_q2a_ad_leftside" ID="pt_q2a_ad_leftside"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_leftside_code_display',
			'label' => 'Paste HTML Ad Code in this box(try 160x90 text/link ad)',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_leftside_codebox'),
			'tags' => 'NAME="pt_q2a_ad_leftside_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_leftside_level')],
			'tags' => 'NAME="pt_q2a_ad_leftside_level" ID="pt_q2a_ad_leftside_level"',
			'options' => $showoptions
		);
		$fields[] = array(
			'label' => 'Google AutoAd',
			'type' => 'checkbox',
			'value' => qa_opt('pt_q2a_ad_autoad'),
			'tags' => 'NAME="pt_q2a_ad_autoad" ID="pt_q2a_ad_autoad"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_ad_autoad_code_display',
			'label' => 'Paste HTML Ad Code in this box',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_ad_autoad_codebox'),
			'tags' => 'NAME="pt_q2a_ad_autoad_code_field"',
            'rows' => 2,
		);		
		$fields[] = array(
			'label' => 'Hide This Ad for the below User Levels and Above',
			'type' => 'select',
			'value' => @$showoptions[qa_opt('pt_q2a_ad_autoad_level')],
			'tags' => 'NAME="pt_q2a_ad_autoad_level" ID="pt_q2a_ad_autoad_level"',
			'options' => $showoptions
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
				'tags' => 'NAME="pt_q2a_simple_ads_manager_save_button"',
				),
			),
		);
	}

}
/*
	Omit PHP closing tag to help avoid accidental output
*/

