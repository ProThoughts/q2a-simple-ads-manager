<?php


class pt_qa_simple_admanager {

	function allow_template($template)
	{
		return ($template!='admin');
	}

	function admin_form(&$qa_content)
	{

		$ok = null;
		if (qa_clicked('np_q_save_button')) 
		{
			qa_opt('pt_q2a_ad_after_question',(bool)qa_post_text('pt_q2a_ad_after_question'));
			qa_opt('pt_q2a_ad_after_menu_bar',(bool)qa_post_text('pt_q2a_ad_after_menu_bar'));
			qa_opt('pt_q2a_ad_after_all_answers',(bool)qa_post_text('pt_q2a_ad_after_all_answers'));
			qa_opt('pt_q2a_ad_after_all_questions',(bool)qa_post_text('pt_q2a_ad_after_all_questions'));
			qa_opt('pt_enable_html_ad_code',(bool)qa_post_text('pt_enable_html_ad_code'));
			qa_opt('pt_q2a_html_ad_codebox', qa_post_text('pt_q2a_html_ad_code_field'));            

			$ok = qa_lang('admin/options_saved');
		}
        
		qa_set_display_rules($qa_content, array(
				
			'pt_q2a_html_ad_code_display' => 'pt_enable_html_ad_code',
				
		));

		$fields = array();

		$fields[] = array(
			'label' => 'Enable admanager',
			'type' => 'checkbox',
			'value' => qa_opt('pt_enable_html_ad_code'),
			'tags' => 'NAME="pt_enable_html_ad_code" ID="pt_enable_html_ad_code"',
		);
		
		$fields[] = array(
			'id' => 'pt_q2a_html_ad_code_display',
			'label' => 'Paste HTML Ad Code in this box',
			'type' => 'textarea',
			'value' => qa_opt('pt_q2a_html_ad_codebox'),
			'tags' => 'NAME="pt_q2a_html_ad_code_field"',
            'rows' => 3,
		);
        
		$fields[] = array(
			'label' => 'Ad after Question',
			'tags' => 'NAME="pt_q2a_ad_after_question"',
			'value' => qa_opt('pt_q2a_ad_after_question'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'label' => 'Ad after Menu Bar',
			'tags' => 'NAME="pt_q2a_ad_after_menu_bar"',
			'value' => qa_opt('pt_q2a_ad_after_menu_bar'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'label' => 'Ad after All Answers',
			'tags' => 'NAME="pt_q2a_ad_after_all_answers"',
			'value' => qa_opt('pt_q2a_ad_after_all_answers'),
			'type' => 'checkbox',
		);
		
		$fields[] = array(
			'label' => 'Ad after All Questions',
			'tags' => 'NAME="pt_q2a_ad_after_all_questions"',
			'value' => qa_opt('pt_q2a_ad_after_all_questions'),
			'type' => 'checkbox',
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

