<?php


class qa_html_theme_layer extends qa_html_theme_base {

        function q_view()
        {
            qa_html_theme_base::q_view();

            //ad after question, just before answers
			if (qa_opt('q2a_enable_admanager')) {
                   if (qa_opt('enable_html_ad_code')) {
						
						if (qa_opt('q2a_ad_after_question')) {
                            
                            $this->output(qa_opt('q2a_html_ad_codebox'));
						}
                            
                   }                     
			}
        }
		// End of q_view()
		
        function header()
        {
            qa_html_theme_base::header();

            //ad after menu navigation bar, just after horizontal line.
			if (qa_opt('q2a_enable_admanager')) {
                   if (qa_opt('enable_html_ad_code')) {
						
						if (qa_opt('q2a_ad_after_menu_bar')) {
                            
                            $this->output(qa_opt('q2a_html_ad_codebox'));
						}
                            
                   }                     
			}
        }
		// End of header()
		
        function a_list($a_list)
        {
            qa_html_theme_base::a_list($a_list);

            //ad after all answers, just before related questions
			if (qa_opt('q2a_enable_admanager')) {
                   if (qa_opt('enable_html_ad_code')) {
						
						if (qa_opt('q2a_ad_after_all_answers')) {
                            
                            $this->output(qa_opt('q2a_html_ad_codebox'));
						}
                            
                   }                     
			}
        }
		// end of a_list()

        function q_list_and_form($q_list)
        {
            
            qa_html_theme_base::q_list_and_form($q_list);

            //ad after all questions
			if (qa_opt('q2a_enable_admanager')) {
                   if (qa_opt('enable_html_ad_code')) {
						
						if (qa_opt('q2a_ad_after_all_questions')) {
                            
                            $this->output(qa_opt('q2a_html_ad_codebox'));
						}
                            
                   }                     
			}

        }
		// end of q_list_and_form()		
		
}
/*
	Omit PHP closing tag to help avoid accidental output
*/
