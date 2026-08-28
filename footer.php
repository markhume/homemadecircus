<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Starter_Theme
 * @since Starter Theme 1.0
 */
?>

		</div><!-- .site-main -->

	
	</div><!-- .site -->

	<footer class="site-footer">
			<div class="footer-inner">

				<div class="row">
					<div class="col-12 col-lg-4">
						<div class="footerinfo">
							<?php the_field('footer', 'option'); ?>
						</div>
						<div class="footer-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
						</div>
						<ul class="credit">
						    <li><a href="https://www.christopherandreou.com">Photography by Christopher Andreou</a></li>
							<li><a href="https://www.youmeandeveryone.com">Website by You, Me + Everyone</a></li>
						</ul>
						<div class="copy"><a href="/copyright">&copy; Upswing Aerial Ltd <?php echo esc_html( date( 'Y' ) ); ?></a><br/>These resources are free to use and adapt for non-commercial purposes. Please credit Upswing Aerial Limited - Homemade Circus when sharing or adapting them - it helps us keep creating free resources!</div>
					</div>
					<div class="col-12 col-lg-4 offset-lg-1">
						<div class="footersignup">
							Keep in touch with everything Upswing!
							<a href="/sign-up/" class="btn signupbtn">
								Subscribe to our mailing list
								<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0 0.25V13.75H18V0.25H0ZM16.1385 1.75L9 7.53475L1.8615 1.75H16.1385ZM1.5 12.25V3.38725L9 9.46525L16.5 3.38725V12.25H1.5Z" fill="white"/>
								</svg>
							</a>
						</div>
						<div class="socials">
							<ul>
								<li>
									<a target="blank" href="https://twitter.com/upswingaerial">
										<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M18 3.99347C17.3377 4.28747 16.626 4.48547 15.879 4.57472C16.6418 4.11797 17.2275 3.39422 17.5028 2.53172C16.7895 2.95472 15.999 3.26222 15.1575 3.42797C14.4847 2.71022 13.524 2.26172 12.462 2.26172C10.0777 2.26172 8.32575 4.48622 8.86425 6.79547C5.796 6.64172 3.075 5.17172 1.25325 2.93747C0.28575 4.59722 0.7515 6.76847 2.3955 7.86797C1.791 7.84847 1.221 7.68272 0.72375 7.40597C0.68325 9.11672 1.9095 10.7172 3.6855 11.0735C3.16575 11.2145 2.5965 11.2475 2.0175 11.1365C2.487 12.6035 3.8505 13.6707 5.4675 13.7007C3.915 14.918 1.959 15.4617 0 15.2307C1.63425 16.2785 3.576 16.8897 5.661 16.8897C12.5175 16.8897 16.3912 11.099 16.1572 5.90522C16.8787 5.38397 17.505 4.73372 18 3.99347Z" fill="black"/>
										</svg>
									</a>
								</li>
								<li>
									<a target="blank" href="https://www.youtube.com/channel/UCf-nA3jV8Gw7l6T4HpDRvLA">
										<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M14.7113 0.707196C12.0082 0.529532 5.988 0.530254 3.28875 0.707196C0.366 0.899305 0.02175 2.59939 0 7.07422C0.02175 11.5411 0.363 13.2484 3.28875 13.4412C5.98875 13.6182 12.0082 13.6189 14.7113 13.4412C17.634 13.2491 17.9783 11.549 18 7.07422C17.9783 2.60734 17.637 0.900027 14.7113 0.707196ZM6.75 9.96307V4.18537L12.75 7.06916L6.75 9.96307Z" fill="black"/>
										</svg>
									</a>
								</li>
								<li>
									<a target="blank" href="https://www.instagram.com/upswingaerial">
									<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_864_644)">
											<path d="M9 2.19647C11.403 2.19647 11.688 2.20547 12.6375 2.24897C15.0765 2.35997 16.2157 3.51722 16.3267 5.93822C16.3702 6.88697 16.3785 7.17197 16.3785 9.57497C16.3785 11.9787 16.3695 12.263 16.3267 13.2117C16.215 15.6305 15.0788 16.79 12.6375 16.901C11.688 16.9445 11.4045 16.9535 9 16.9535C6.597 16.9535 6.312 16.9445 5.36325 16.901C2.91825 16.7892 1.785 15.6267 1.674 13.211C1.6305 12.2622 1.6215 11.978 1.6215 9.57422C1.6215 7.17122 1.63125 6.88697 1.674 5.93747C1.78575 3.51722 2.922 2.35922 5.36325 2.24822C6.31275 2.20547 6.597 2.19647 9 2.19647ZM9 0.574219C6.55575 0.574219 6.24975 0.584719 5.28975 0.628219C2.02125 0.778219 0.20475 2.59172 0.05475 5.86322C0.0105 6.82397 0 7.12997 0 9.57422C0 12.0185 0.0105 12.3252 0.054 13.2852C0.204 16.5537 2.0175 18.3702 5.289 18.5202C6.24975 18.5637 6.55575 18.5742 9 18.5742C11.4443 18.5742 11.751 18.5637 12.711 18.5202C15.9765 18.3702 17.7975 16.5567 17.9452 13.2852C17.9895 12.3252 18 12.0185 18 9.57422C18 7.12997 17.9895 6.82397 17.946 5.86397C17.799 2.59847 15.9832 0.778969 12.7118 0.628969C11.751 0.584719 11.4443 0.574219 9 0.574219ZM9 4.95272C6.44775 4.95272 4.3785 7.02197 4.3785 9.57422C4.3785 12.1265 6.44775 14.1965 9 14.1965C11.5522 14.1965 13.6215 12.1272 13.6215 9.57422C13.6215 7.02197 11.5522 4.95272 9 4.95272ZM9 12.5742C7.34325 12.5742 6 11.2317 6 9.57422C6 7.91747 7.34325 6.57422 9 6.57422C10.6567 6.57422 12 7.91747 12 9.57422C12 11.2317 10.6567 12.5742 9 12.5742ZM13.8045 3.69047C13.2075 3.69047 12.7238 4.17422 12.7238 4.77047C12.7238 5.36672 13.2075 5.85047 13.8045 5.85047C14.4008 5.85047 14.8837 5.36672 14.8837 4.77047C14.8837 4.17422 14.4008 3.69047 13.8045 3.69047Z" fill="black"/>
										</g>
											<defs>
												<clipPath id="clip0_864_644">
													<rect width="18" height="18" fill="white" transform="translate(0 0.574219)"/>
												</clipPath>
											</defs>
										</svg>
									</a>
								</li>
								<li>
									<a target="blank" href="https://www.facebook.com/upswing.aerialarts">
										<svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M2.76466 6.05538H0.823486V8.64361H2.76466V16.4083H5.99996V8.64361H8.35654L8.58819 6.05538H5.99996V4.97673C5.99996 4.35879 6.12419 4.1142 6.72143 4.1142H8.58819V0.878906H6.12419C3.79737 0.878906 2.76466 1.9032 2.76466 3.86508V6.05538Z" fill="black"/>
										</svg>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="footerlogo">
							<a target="blank" href="https://upswing.org.uk/">
								<svg width="251" height="105" viewBox="0 0 251 105" fill="none" xmlns="http://www.w3.org/2000/svg">
									<title>Upswing</title>
									<path d="M232.441 0.153228L6.75336 44.0226C2.24732 44.8981 -0.722982 49.3017 0.153331 53.8072L8.67084 97.6283C9.54715 102.135 13.9503 105.105 18.4569 104.229L244.144 60.3599C248.65 59.4835 251.62 55.0804 250.744 50.5743L242.226 6.75372C241.35 2.24728 236.947 -0.722694 232.441 0.153228Z" fill="#091419"/>
									<path d="M18.6316 59.6143C18.4047 58.4479 18.9472 57.5912 20.033 57.3802C21.1191 57.1686 21.9433 57.7598 22.1694 58.9266L25.4761 75.9355C26.3516 80.439 29.9238 82.4984 34.4269 81.6234C38.9309 80.7479 41.4703 77.4999 40.5948 72.9968L37.289 55.9876C37.0621 54.8207 37.6049 53.9644 38.6911 53.7541C39.7763 53.5431 40.6007 54.133 40.8272 55.2994L43.8678 70.942C45.7437 80.5917 39.9267 83.7257 35.0205 84.679C30.1153 85.6332 23.5473 84.9072 21.672 75.2561L18.6316 59.6143Z" fill="white"/>
									<path d="M59.6827 65.3642L64.9098 64.348C68.4084 63.6677 70.2725 60.5929 69.6393 57.3366C69.0924 54.5204 66.8747 51.6966 62.4515 52.5571L57.3843 53.542L59.6827 65.3642ZM62.0352 77.4668C62.2621 78.6333 61.7192 79.4901 60.6331 79.7011C59.5478 79.9125 58.7236 79.3215 58.4971 78.1545L53.6271 53.1041C53.4166 52.0184 53.8153 51.0646 55.1416 50.8065L62.1385 49.446C67.8888 48.3287 72.2092 51.662 73.1783 56.6484C74.1474 61.6341 70.9723 66.3404 65.7452 67.357L60.2768 68.4198L62.0352 77.4668Z" fill="white"/>
									<path d="M97.5213 45.7821C97.6853 46.6258 97.1829 47.4751 96.2987 47.6471C94.7296 47.9523 93.8475 46.2034 90.309 46.8915C87.6949 47.3993 86.086 49.4234 86.5551 51.8367C87.782 58.149 100.787 52.4912 102.663 62.1414C103.586 66.8873 100.963 71.8612 94.73 73.0727C90.9504 73.8074 86.4872 73.1725 86.0963 71.1631C85.909 70.1981 86.228 69.2593 87.2328 69.0637C88.4389 68.8292 90.5579 70.713 94.1768 70.0095C97.8361 69.2981 99.5317 66.214 98.9147 63.0377C97.5933 56.2416 84.6427 62.181 82.8218 52.8121C82.1732 49.4746 84.5278 44.8437 89.8356 43.8125C93.3741 43.1244 97.1616 43.932 97.5213 45.7821Z" fill="white"/>
									<path d="M122.96 38.8346C123.069 37.6865 123.611 37.2469 124.495 37.0753C125.38 36.903 126.045 37.1083 126.579 38.1311L137.668 59.9698L137.747 59.954L137.04 36.3476C137.013 35.1421 137.564 34.5346 138.649 34.324C139.654 34.1284 140.399 34.7345 140.571 35.6191C140.656 36.0617 140.718 36.5929 140.721 37.4688L140.919 61.6746C140.92 62.968 140.609 64.1557 138.84 64.4992C137.474 64.7648 136.557 64.5678 135.612 62.7057L125.661 42.8582L125.58 42.874L123.79 65.0041C123.61 67.0843 122.836 67.6097 121.469 67.8762C119.699 68.2201 118.966 67.235 118.482 66.0361L109.599 43.5184C109.273 42.7046 109.132 42.1897 109.045 41.7471C108.874 40.8624 109.336 40.022 110.341 39.8267C111.427 39.6152 112.164 39.9728 112.591 41.1006L120.778 63.2523L120.859 63.2369L122.96 38.8346Z" fill="white"/>
									<path d="M160.948 58.24C161.175 59.4077 160.632 60.2631 159.547 60.4747C158.46 60.6857 157.636 60.0945 157.409 58.9277L152.486 33.5963C152.259 32.4294 152.802 31.5725 153.887 31.3619C154.973 31.1508 155.797 31.7412 156.023 32.9081L160.948 58.24Z" fill="white"/>
									<path d="M177.675 54.9887C177.902 56.1553 177.359 57.012 176.274 57.223C175.188 57.4337 174.364 56.8434 174.137 55.6765L169.252 30.5457C168.979 29.1382 169.328 28.3605 170.453 28.142C171.5 27.9388 172.068 28.2872 173.307 29.5066L191.823 47.4821L191.904 47.4662L187.871 26.7178C187.644 25.551 188.186 24.695 189.272 24.484C190.357 24.2728 191.182 24.8631 191.408 26.0301L196.293 51.1609C196.567 52.5688 196.218 53.3465 195.091 53.565C194.047 53.7677 193.478 53.4194 192.241 52.2004L173.722 34.2254L173.642 34.2408L177.675 54.9887Z" fill="white"/>
									<path d="M222.451 34.3926C221.446 34.5883 220.622 34.2058 220.401 33.0797C220.183 31.9545 220.805 31.2904 221.81 31.0952L227.762 29.9379C229.572 29.5865 230.469 30.121 230.899 32.3332C232.244 39.2497 231.078 46.5699 221.347 48.4615C213.104 50.0639 207.419 43.7836 205.971 36.3443C204.526 28.9054 207.245 20.9903 216.211 19.2472C222.082 18.1066 226.618 20.3958 226.914 21.9245C227.094 22.8487 226.559 23.7458 225.553 23.9415C223.784 24.2854 221.711 21.3496 216.565 22.3503C210.13 23.601 208.689 30.1402 209.752 35.6095C210.815 41.0781 214.522 46.6173 221.196 45.3198C226.746 44.2407 228.517 38.972 227.767 35.1124L227.438 33.4236L222.451 34.3926Z" fill="white"/>
								</svg>
							</a>
						</div>
					</div>
				</div>


			</div>
	</footer>


	<!-- <div class="signupformfull">
		<div class="signupform">
			<div class="closesubscribe">
				<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm0 10.293l5.293-5.293.707.707-5.293 5.293 5.293 5.293-.707.707-5.293-5.293-5.293 5.293-.707-.707 5.293-5.293-5.293-5.293.707-.707 5.293 5.293z"/></svg>
			</div>
			<div id="mc_embed_signup">
				<form action="https://upswing.us5.list-manage.com/subscribe/post?u=d1230ab2087e94199456d9603&amp;id=f68849c193&amp;v_id=3269&amp;f_id=0018f8e6f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
					
					<?php $sidebar_sign_up = get_field('pop_up_sign_up', 'option'); ?>	

					<h1><?php echo $sidebar_sign_up['title']; ?></h1>
					<p><?php echo $sidebar_sign_up['text']; ?></p>

					<div class="form-names">
						<div class="mc-field-group">
							<label for="mce-FNAME">First Name <span class="asterisk">*</span></label>
							<input type="text" value="" name="FNAME" class="required " id="mce-FNAME">
							<span id="mce-FNAME-HELPERTEXT" class="helper_text"></span>
						</div>
						<div class="mc-field-group">
							<label for="mce-LNAME">Last Name <span class="asterisk">*</span></label>
							<input type="text" value="" name="LNAME" class="required " id="mce-LNAME">
							<span id="mce-LNAME-HELPERTEXT" class="helper_text"></span>
						</div>
					</div>
					<div class="mc-field-group">
						<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
					</label>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
						<span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
					</div>
					<div class="mc-field-group">
						<label for="mce-MMERGE4">Postcode - to let you know when we're in your area </label>
						<input type="text" value="" name="MMERGE4" class="" id="mce-MMERGE4">
						<span id="mce-MMERGE4-HELPERTEXT" class="helper_text"></span>
					</div>
					<div id="mergeRow-gdpr" class="mergeRow gdpr-mergeRow content__gdprBlock mc-field-group">
						<div class="content__gdpr">						
							<p class="required ">Upswing will use the information you provide on this form to be in touch with you and to provide updates and marketing. <br/><a href="/cookies-and-privacy/">See our privacy policy here</a>.</p>
							<fieldset class="mc_fieldset gdprRequired mc-field-group" name="interestgroup_field">
							<label class="checkbox subfield" for="gdpr_13"><input type="checkbox" id="gdpr_13" name="gdpr[13]" value="Y" class="av-checkbox required"><span>I confirm that I wish to recieve emails</span> </label>
							</fieldset>
						</div>			
					</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d1230ab2087e94199456d9603_f68849c193" tabindex="-1" value=""></div>
						<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
				</form>
			</div>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[8]='MMERGE8';ftypes[8]='text';fnames[3]='MMERGE3';ftypes[3]='address';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='radio';fnames[6]='MMERGE6';ftypes[6]='radio';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
		</div>
	</div> -->


	<?php wp_footer(); ?>
</body>
</html>
