<?php

// HOOKS

add_action('wp_enqueue_scripts', 'wwgcbar_scripts');
add_action('admin_init', 'wwgcbar_admin_scripts');

add_action('init', 'wwgcbar_register_shortcode');

add_action('wp_footer', 'wwgcbar_code');
 

// ADD SCRIPTS
function wwgcbar_scripts() {
	wp_enqueue_style('wwgcbar_main_style', plugins_url() . '/ww-gdpr-plugin/includes/stylesheets/screen.css');
	wp_enqueue_script('wwgcbar_main_script', plugins_url() . '/ww-gdpr-plugin/includes/js/scripts.js');
}
if(is_admin()) {
	function wwgcbar_admin_scripts() {
		wp_enqueue_style('wwgcbar_admin_style', plugins_url() . '/ww-gdpr-plugin/includes/stylesheets/admin_screen.css');
		wp_enqueue_script('wwgcbar_admin_script', plugins_url() . '/ww-gdpr-plugin/includes/js/admin-scripts.js');
	}	
}


// BAR CONTENT

function wwgcbar_code () {
	
	global $wwgcbar_options;
	
	ob_start(); ?>
	
	<?php if($wwgcbar_options['enable']) : ?>
		<style>
			.wwgcbar-content {
				<?php if(!empty($wwgcbar_options['position'])) : ?>
				top: -150%;
				<?php else : ?>
				bottom: -150%;
				<?php endif; ?>
			}
			.wwgcbar-content.active {
				<?php if(!empty($wwgcbar_options['position'])) : ?>
				top: 0;
				<?php else : ?>
				bottom: 0;
				<?php endif; ?>
			}			
			.wwgcbar-content p {
				color: <?php if(!empty($wwgcbar_options['content_col'])) : echo $wwgcbar_options['content_col']; else : ?>#FFFFFF<?php endif; ?>;
			}
			.wwgcbar-content a {
				color: <?php if(!empty($wwgcbar_options['content_col_link'])) : echo $wwgcbar_options['content_col_link']; else : ?>#FFFFFF<?php endif; ?>;
			}			
			.wwgcbar-content .wwgcbar-btn1 {
				color: <?php if(!empty($wwgcbar_options['button_1_col'])) : echo $wwgcbar_options['button_1_col']; else : ?>#FFFFFF<?php endif; ?>;
				background-color: <?php if(!empty($wwgcbar_options['button_1_bg'])) : echo $wwgcbar_options['button_1_bg']; else : ?>#45af0c<?php endif; ?>;
			}
			.wwgcbar-content .wwgcbar-btn2 {
				color: <?php if(!empty($wwgcbar_options['button_2_col'])) : echo $wwgcbar_options['button_2_col']; else : ?>#FFFFFF<?php endif; ?>;
				background-color: <?php if(!empty($wwgcbar_options['button_2_bg'])) : echo $wwgcbar_options['button_2_bg']; else : ?>#e27a18<?php endif; ?>;
			}
		</style>
		<div id="wwgcbar" class="wwgcbar-content" style="background:<?php if(!empty($wwgcbar_options['content_bg'])) : echo $wwgcbar_options['content_bg']; else : ?>#000000<?php endif; ?>;">
			<div class="container">
				<div class="left">
					<p>
					<?php if(!empty($wwgcbar_options['content'])) : ?>
						<?php echo $wwgcbar_options['content']; ?>
					<?php else : ?>
						We use cookies to ensure that we give you the best possible experience on our website. By using this site you agree to our <a href="<?php echo $wwgcbar_options['pp_link']; ?>" <?php if($wwgcbar_options['pp_target']) : ?>target="_blank"<?php endif; ?>>Privacy Policy</a>
					<?php endif; ?>
					</p>
				</div>
				<div class="right">
					<?php if(!$wwgcbar_options['buttons_swap']) : ?>
					<span class="wwgcbar-btn wwgcbar-btn1" id="acceptBtn">
						<?php if(!empty($wwgcbar_options['button_1_text'])) : ?>
							<?php echo $wwgcbar_options['button_1_text']; ?>
						<?php else : ?>
							Accept
						<?php endif; ?>
					</span>
					<span class="wwgcbar-btn wwgcbar-btn2" id="settingsBtn">
						<?php if(!empty($wwgcbar_options['button_2_text'])) : ?>
							<?php echo $wwgcbar_options['button_2_text']; ?>
						<?php else : ?>
							Cookie settings
						<?php endif; ?>
					</span>
					<?php else : ?>
					<span class="wwgcbar-btn wwgcbar-btn2" id="settingsBtn">
						<?php if(!empty($wwgcbar_options['button_2_text'])) : ?>
							<?php echo $wwgcbar_options['button_2_text']; ?>
						<?php else : ?>
							Cookie settings
						<?php endif; ?>
					</span>
					<span class="wwgcbar-btn wwgcbar-btn1" id="acceptBtn">
						<?php if(!empty($wwgcbar_options['button_1_text'])) : ?>
							<?php echo $wwgcbar_options['button_1_text']; ?>
						<?php else : ?>
							Accept
						<?php endif; ?>
					</span>										
					<?php endif; ?>	
				</div>
				<div class="wwgcbar-clear"></div>
			</div>
		</div>
		
		<!-- SETTINGS MODAL -->
		<div class="wwgcbar-modal-wrapper hidden" id="wwgcbar-modal">
			<div class="wwgcbar-modal">
				<span id="wwgcbar-modal-close">&times;</span>
				<div class="wwgcbar-policy-overview">
					<h2>Cookie settings</h2>
					<span class="m-bot-0">
						<?php if($wwgcbar_options['content1']) : ?>
							<?php echo $wwgcbar_options['content1']; ?>
						<?php else : ?>
						This website uses cookies to improve your online experience. Some of the cookies (categorised as 'necessary') are stored on your browser as they are essential
						<?php endif; ?>
						<span class="wwgcbar-dots">...</span>
					</span>					
					<span class="wwgcbar-description hidden m-top-0">
						<?php if($wwgcbar_options['content12']) : ?>
							<?php echo $wwgcbar_options['content12']; ?>
						<?php else : ?>						
						for the basic functionality of the website. Other third-party cookies (categorised as 'non-necessary') help us analyse and understand how you use the website. These cookies will be stored in your browser only with your consent. You have the option to disable (opt-out) of these cookies, but it may affect your browsing experience.
						<?php endif; ?>
					</span>
					<p class="wwgcbar-show-description">Show more</p>
					
				</div>
				<div class="wwgcbar-row">
					<div class="wwgcbar-modal-left">
						<h3>Necessary</h3>
						<span class="wwgcbar-show-description">Show more</span>
						<p class="wwgcbar-description hidden">
							<?php if($wwgcbar_options['content2']) : ?>
								<?php echo $wwgcbar_options['content2']; ?>
							<?php else : ?>							
							Necessary cookies enable the website to function properly. They also include essential security features to protect the website. These cookies do not store any personal information.
							<?php endif; ?>
						</p>
					</div>
					<div class="wwgcbar-modal-right">
						<p>Always Enabled</p>
					</div>
					<div class="wwgcbar-clear"></div>
				</div>

				<div class="wwgcbar-row">
					<div class="wwgcbar-modal-left">
						<h3>Non-Necessary</h3>
						<span class="wwgcbar-show-description">Show more</span>
						<p class="wwgcbar-description hidden">
						<?php if($wwgcbar_options['content3']) : ?>
							<?php echo $wwgcbar_options['content3']; ?>
						<?php else : ?>							
							Termed 'non-necessary' cookies, these are used specifically to collect personal user data via analytics, ads, and other embedded content. It is mandatory to procure user consent prior to running these cookies on the website. Please choose to enable or disable our website cookies using the selection switch.
						<?php endif; ?>
						</p>
					</div>
					<div class="wwgcbar-modal-right">
						<label class="switch">
						  <input name="non-necessary-cookies" type="checkbox" id="nncookies">
						  <span class="slider round"></span>
						  <span class="wwgcbar-checkbox-text"></span>
						</label>		
					</div>	
					<div class="wwgcbar-clear"></div>
				</div>				
			</div>
		</div>
		
		
		
	<?php
	endif;
	echo ob_get_clean();

}

function wwgcbar_register_shortcode() {
	add_shortcode('wwgcbar', 'wwgcbar_shortcode');
}

function wwgcbar_shortcode ($args) {
	global $wwgcbar_options;
	
	echo $wwgcbar_options['cookie_shortcode'];
}