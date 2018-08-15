<?php


class qa_html_theme_layer extends qa_html_theme_base {
	function adoutput($adcode)
	{
		if($this->disabledcategory()) return;
		$this->output ('<div class="adcode">'.$adcode.'</div>');
		
	}

	function disabledcategory()
	{
		if($this->template !== 'question') return;
		$categoryid = $this->content['q_view']['raw']['categoryid'];
		$cats = explode(",",qa_opt('pt_q2a_ad_hide_categories'));
		if(in_array($categoryid, $cats))
			return true;
		return false;
				
	}
	//ad after question, just before answers
	function q_view($q_view)
	{
		if (qa_opt('pt_q2a_ad_before_question') && $user_level <  qa_opt('pt_q2a_ad_before_question_level')) 
		{
			$this->adoutput(qa_opt('pt_q2a_ad_after_question_codebox'));
		}                     
		qa_html_theme_base::q_view($q_view);
		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_after_question') && $user_level <  qa_opt('pt_q2a_ad_after_question_level')) 
		{
			$this->adoutput(qa_opt('pt_q2a_ad_after_question_codebox'));
		}                     
	}
	// End of q_view()

	function head_css()
	{
		$this->output('<style type="text/css">'.qa_opt('pt_q2a_ad_css').' </style>');
		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_autoad') && $user_level < qa_opt('pt_q2a_ad_autoad_level')) 
		$this->adoutput(qa_opt("pt_q2a_ad_autoad_codebox"));
		qa_html_theme_base::head_css();
	}
	//ad after menu navigation bar, just after horizontal line.		
	function header()
	{
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
		{
			qa_html_theme_base::header();
			return;
		}
		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_leftside') && $user_level < qa_opt('pt_q2a_ad_leftside_level')) 
		$this->adoutput('<div class = "sidebar-ad">'.qa_opt("pt_q2a_ad_leftside_codebox"). '</div>');
		qa_html_theme_base::header();
		require_once QA_INCLUDE_DIR.'app/posts.php';
		if (qa_opt('pt_q2a_ad_after_menu_bar') && $user_level < qa_opt('pt_q2a_ad_after_menu_bar_level')) 
		{
			$this->adoutput(qa_opt('pt_q2a_ad_after_menu_bar_codebox'));
		}                     
	}
	// End of header()

	function a_list_items($a_items)
	{
		$first = true;
		foreach ($a_items as $a_item)
		{
			$this->a_list_item($a_item);
			$user_level = qa_get_logged_in_level();
			if ($first && qa_opt('pt_q2a_ad_after_first_answer') && $user_level < qa_opt('pt_q2a_ad_after_first_answer_level') && (count($a_items) > 1 || (!qa_opt('pt_q2a_ad_after_all_answers') || $user_level >= qa_opt('pt_q2a_ad_after_all_answers_level')))) 
			{
				$first = false;
				$this->adoutput(qa_opt('pt_q2a_ad_after_first_answer_codebox'));
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
			$this->adoutput(qa_opt('pt_q2a_ad_after_all_answers_codebox'));
		}                     
	}
	// end of a_list()

	//ad after all questions
	function q_list_and_form($q_list)
	{

		$this->adoutput(qa_opt('pt_q2a_ad_before_all_questions_codebox'));
		qa_html_theme_base::q_list_and_form($q_list);
		if($this -> template === 'ask' && qa_opt('pt_q2a_ad_hideaskpage'))
			return;

		$user_level = qa_get_logged_in_level();
		if (qa_opt('pt_q2a_ad_after_all_questions') && $user_level < qa_opt('pt_q2a_ad_after_all_questions_level')) 
		{
			$this->adoutput(qa_opt('pt_q2a_ad_after_all_questions_codebox'));
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
			$this->adoutput(qa_opt('pt_q2a_ad_sidebar_codebox'));
		}                     
	}  
	// End of sidebar()

}
/*
   Omit PHP closing tag to help avoid accidental output
 */
