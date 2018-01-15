<?php
/* Template Name: Board Members */

 get_header(); ?>
 <div class="grop-page <?php echo esc_attr($groppe_layout_class .' '. $groppe_content_padding .' '. $groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
 	<div class="<?php echo esc_attr( $groppe_column_class ); ?>">
 		<?php
 			while ( have_posts() ) : the_post();
 				the_content();
 				if ( comments_open() || get_comments_number() ) :
 					comments_template();
 				endif;
 			endwhile;
 			  ?>
        <div class='container'>
        <div class='boardMemberHeader'>
          <h1>BOARD MEMBERS</h1>
        </div>
        <div class='boardMemberContainer'>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src='https://mtdsa.org/wp-content/uploads/2017/11/philipBioPic.png' />
            <h3 class="boardMemberData">Philip L. Yasenak, President</h3>
            <p class="boardMemberData">Philip is a CPA at Wipfli LLP in Missoula Montana. He is a retired Army Veteran who served in Iraq. Philip has a 8 year old son who has Down syndrome and has always wanted a better connection with the Down syndrome community. He is passionate about helping parents and the community understand the disability and he has a desire to reach out to help these children. Philip wants to see these children succeed in all areas and he is willing to go above and beyond to make sure his son and other individuals with Down syndrome get everything possible to make their lives easier. Contact Philip: <a href="mailto:philip@mtdsa.org">philip@mtdsa.org</a></p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src='https://mtdsa.org/wp-content/uploads/2017/11/rachelleJetteBioPic.jpg' />
            <h3 class="boardMemberData">Rachelle Jette, Vice President</h3>
            <p class="boardMemberData">Rachelle is a CPA serving as Client Accounting Manager at the Montana and Idaho Community Development Corporation. She received her Bachelor’s degree in Business Administration – Accounting as well as her Masters of Accountancy from the University of Montana. Rachelle joined the Board in May 2015 and has enjoyed using her accounting and financial skills to help grow the organization. She feels very blessed to have this opportunity to get to know all of the amazing individuals and families.Rachelle grew up in Missoula and was raised with an avid love for her community and all things Montana. Outside of work, Rachelle enjoys spending time with her family and hiking with her dogs. Contact Rachelle: <a href="mailto:rachelle@mtdsa.org">rachelle@mtdsa.org</a></p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src='https://mtdsa.org/wp-content/uploads/2017/11/Professional-Pic-Sam-e1510093437968.jpg' />
            <h3 class="boardMemberData">Sam Foshag, Treasurer</h3>
            <p class="boardMemberData">Sam is a CPA at Wipfli LLP in Missoula, Montana. She received her Bachelor’s degree in Business Administration – Accounting from the University of Montana and a Master’s Degree in Taxation from the University of Denver. Sam joined the Board in October of 2017 to use her accounting and financial skills to help serve individuals with Down syndrome and their families.
            Sam was born and raised in Montana and has enjoyed living in Missoula for the past two years with her husband. Outside of work, she enjoys spending time with family and friends, reading, going to concerts, and just taking in all that Missoula has to offer. Contact Sam: <a href="mailto:sam@mtdsa.org">sam@mtdsa.org</a>
            </p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src='https://mtdsa.org/wp-content/uploads/2017/11/karenBaileyBioPic.png' />
            <h3 class="boardMemberData">Karen Bailey, Immediate Past President</h3>
            <p class="boardMemberData">Karen is the mother of Alyssa, an adult with Down syndrome, who lives independently in a condo with
             support. Karen has been in the education field for 30 years,
             both as a teacher and administrator. She has been a fierce advocate
             for people with Down syndrome since Alyssa’s birth in 1990 and continues to be active
             on a state and national level with disability advocacy organizations. Karen is the mother of two other
             adult children, Wes and Kayla. Contact Karen: <a href="mailto:karen@mtdsa.org">karen@mtdsa.org</a>
            </p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src='https://mtdsa.org/wp-content/uploads/2017/12/431918_755037177726_751259633_n-e1513651811840.jpg' />
            <h3 class="boardMemberData">Erika Surmi, Secretary</h3>
            <p class="boardMemberData">Erika is a local Missoulian who works for Vocational Rehabilitation Programs with the State of Montana. She received her Bachelor's degree in Psychology in May of 2011 and is currently in the process of applying to graduate school for Speech Language Pathology. She also has background working as a writer, copy writer, and blogger for large corporations. She is very excited to bring her experience with working with people with disabilities to MTDSA. Outside of wearing her many hats, Erika enjoys skiing, hiking, and spending time with family, friends, and her chocolate lab, Guinness. Contact Erika: <a href="mailto:erika@mtdsa.org">erika@mtdsa.org</a>
            </p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src='https://mtdsa.org/wp-content/uploads/2017/11/katieBioPic.jpg' />
            <h3 class="boardMemberData">Katie Seaman, Director</h3>
            <p class="boardMemberData">Katie is a native Missoulian who graduated from Hellgate High School and attended both University of
            Montana and Montana State University earning a bachelor’s degree in microbiology and a certificate in
            forensic science. Katie spends her days selling beer across the western half of Montana as the Sales Manager for Draught Works Brewery. She had multiple classmates at a young
            age with Down syndrome, and the lasting impression they left on her is what inspired her to become
            involved with MTDSA. She looks forward to using her connections to all sorts of people throughout the
            community to bring attention to the cause. Katie spends her free time with her family and friends
            attending Grizzly athletic events, going to concerts, playing volleyball, softball and golf and is a regular
            platelet donor for the Missoula Red Cross. Contact Katie: <a href="mailto:katie@mtdsa.org">katie@mtdsa.org</a>
            </p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src="https://mtdsa.org/wp-content/uploads/2017/11/erinBioPic.jpg" />
            <h3 class="boardMemberData" >Erin Thorsen, Director</h3>
            <p class="boardMemberData">Erin is a pediatric Speech-Language Pathologist at Community Medical Center in Missoula. She received her Master’s in Communication Disorders from Eastern Washington University- Spokane in 2008. She has worked at Community Medical Center since her graduation. She looks forward to bringing her skills and knowledge about special services and support for families to the Down syndrome association. Erin grew up in Missoula and graduated from Hellgate High School. She is married and has a 2 year old son, Luke. In her free time she enjoys spending time with family and friends, golfing, going to Grizzly football games and skiing. Contact Erin: <a href="mailto:erin@mtdsa.org">erin@mtdsa.org</a>
            </p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData" src='https://mtdsa.org/wp-content/uploads/2017/11/jessieCrowleyBioPic.png' />
            <h3 class="boardMemberData">Jessie Crowley, Director</h3>
            <p class="boardMemberData">Jessie is the owner of 5 Crow Photo, mother of 3 beautiful children, and wife to Austin. While she holds a strong passion for photography, her true love is her family, and she strives to make her priorities reflect that. Jessie and Austin's children range in the ages of 14 to 5. She and her husband decided to have their second child when they were 26 years old and were blessed with their son, Jacob, who was born with Down syndrome. While they were faced with a great deal of challenges that can come with raising a child with Down syndrome, Jessie and her husband have always been Jacob’s greatest advocates. When presented the opportunity to be a member of the Montana Down Syndrome Association Jessie knew she wanted to be involved without question. She is thrilled to have a chance to make a difference, help build a brighter future, and to see what tommorow holds for Montana’s involvement with this cause. A personal goal of hers is involving art and self awareness to help inclusion and celebration of differences in all individuals. Contact Jessie:
            <a href="mailto:jessie@mtdsa.org">jessie@mtdsa.org</a>
            </p>
          </div>
          <div class='boardMemberItem'>
            <img class="boardMemberData"src='https://mtdsa.org/wp-content/uploads/2017/11/kelsey-Lexar-0005-e1511547216908.jpg' />
            <h3 class="boardMemberData">Kelsey Adcock, Director</h3>
            <p class="boardMemberData">Kelsey is a local Missoulian who recently graduated from University of Montana earning her bachelor’s degree in psychology, a minor in sociology, as well as a minor in human family development. Now, she spends her days working at Youth Dynamics as a Youth Case Manager. Kelsey has grown up with a passion to help people which led her to become involved with the MTDSA. In her free time Kelsey enjoys cooking, traveling, and hanging out with friends and family. She really looks forward to her experience as a member of the Montana Down Syndrome Association and hopes to make long lasting connections with people in the Montana community. Contact Kelsey: <a href='mailto:kelsey@mtdsa.org'>kelsey@mtdsa.org</a></p>
          </div>
        </div>
      </div>
 		<?php
 			wp_reset_postdata();  // avoid errors further down the page
 		?>
 	</div><!-- Content Area -->
 	<?php
 	if ( $groppe_page_layout === 'left-sidebar' || $groppe_page_layout === 'right-sidebar') { get_sidebar(); }?>
 </div>

 <?php
 if($above_footer_widget) {
 	if (is_active_sidebar('above-footer')) {
 	  dynamic_sidebar('above-footer');
 	}
 }
 get_footer();
