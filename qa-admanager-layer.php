<?php


class qa_html_theme_layer extends qa_html_theme_base {

	//ad after question, just before answers
	function q_view($q_view)
	{
		qa_html_theme_base::q_view($q_view);
		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_after_question') && $user_level <  qa_opt('pt_q2a_ad_after_question_level')) 
		{
			$this->output(qa_opt('pt_q2a_ad_after_question_codebox'));
		}                     
	}
	// End of q_view()

	//ad after menu navigation bar, just after horizontal line.		
	function header()
	{
		qa_html_theme_base::header();
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;
		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_after_menu_bar') && $user_level < qa_opt('pt_q2a_ad_after_menu_bar_level')) 
		{
			$this->output(qa_opt('pt_q2a_ad_after_menu_bar_codebox'));
		}                     
	}
	// End of header()

	function a_list_items($a_items)
	{
		$first = true;
		foreach ($a_items as $a_item)
		{
			$this->a_list_item($a_item);
			if ($first && qa_opt('pt_q2a_ad_after_first_answer') && $user_level < qa_opt('pt_q2a_ad_after_first_answer_level') && (count($a_items) > 1 || (!qa_opt('pt_q2a_ad_after_all_answers') || $user_level >= qa_opt('pt_q2a_ad_after_all_answers_level')))) 
			{
				$first = false;
				$this->output(qa_opt('pt_q2a_ad_after_first_answer_codebox'));
			}                     
		}
	}



	//ad after all answers, just before related questions		
	function a_list($a_list)
	{
		qa_html_theme_base::a_list($a_list);

		$user_level = qa_get_logged_in_level();
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;
		if (qa_opt('pt_q2a_ad_after_all_answers') && $user_level < qa_opt('pt_q2a_ad_after_all_answers_level')) 
		{
			$this->output(qa_opt('pt_q2a_ad_after_all_answers_codebox'));
		}                     
	}
	// end of a_list()

	//ad after all questions
	function q_list_and_form($q_list)
	{

		qa_html_theme_base::q_list_and_form($q_list);
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;

		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_after_all_questions') && $user_level < qa_opt('pt_q2a_ad_after_all_questions_level')) 
		{
			$this->output(qa_opt('pt_q2a_ad_after_all_questions_codebox'));
		}                     
	}
	// end of q_list_and_form()		

	function sidebar()
	{
		qa_html_theme_base::sidebar();
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;

		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_sidebar') && $user_level < qa_opt('pt_q2a_ad_sidebar_level')) 
		{
			$this->output(qa_opt('pt_q2a_ad_sidebar_codebox'));
		}                     
	}
	// End of sidebar()

}
/*
   Omit PHP closing tag to help avoid accidental output
 */
