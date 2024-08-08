<?php

// CREATE MENU ITEM
function wwgcbar_menu_link() {
	add_options_page(
		'WW GDPR Bar Link Options',
		'WW GDPR Bar Link',
		'manage_options',
		'wwgcbar-options',
		'wwgcbar_options_content'
	);
}

add_action('admin_menu', 'wwgcbar_menu_link');

function wwgcbar_options_content() {

	// init options global
	global $wwgcbar_options;

	ob_start(); ?>

<div class="wrap">
	<div class="wwgcbar-header">
		<h2><?php _e('WW GDPR Bar Settings', 'wwgcbar_domain'); ?></h2>
	</div>
	<div class="wwgcbar-content">
		<form method="post" action="options.php">

			<?php settings_fields('wwgcbar_settings_group'); ?>

			<table class="form-table">
				<tbody>

<!-- BAR ENABLE					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[enable]">
								<?php _e('Enable', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[enable]" type="checkbox" id="wwgcbar_settings[enable]" value="1" <?php checked('1', $wwgcbar_options['enable']); ?>>
						</td>
					</tr>

<!-- BAR POSITION					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[position]">
								<?php _e('Bar position', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[position]" type="checkbox" id="wwgcbar_settings[position]" value="1" <?php checked('1', $wwgcbar_options['position']); ?>>
							<p class="description">
								<?php _e('Default position - Bottom / Checked - Top', 'wwgcbar_domain'); ?>
							</p>
						</td>
					</tr>

<!-- BAR TEXT CONTENT -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content]">
								<?php _e('Bar text content', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<textarea name="wwgcbar_settings[content]" id="wwgcbar_settings[content]" class="regular-text"><?php echo $wwgcbar_options['content'] ?></textarea>
						</td>
					</tr>

<!-- BAR TEXT COLOR					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content_col]">
								<?php _e('Bar text colour', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[content_col]" type="text" id="wwgcbar_settings[content_col]" value="<?php echo $wwgcbar_options['content_col']; ?>" class="regular-text" placeholder="#FFFFFF">
						</td>
					</tr>

<!-- BAR BACKGROUND COLOR					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content_bg]">
								<?php _e('Bar background colour', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[content_bg]" type="text" id="wwgcbar_settings[content_bg]" value="<?php echo $wwgcbar_options['content_bg']; ?>" class="regular-text" placeholder="#000000">
						</td>
					</tr>

<!-- PRIVACY POLICY LINK					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[pp_link]">
								<?php _e('Privacy policy link', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[pp_link]" type="text" id="wwgcbar_settings[pp_link]" value="<?php echo $wwgcbar_options['pp_link']; ?>" class="regular-text">
							<p class="description">
								<?php _e('Privacy Policy / Terms & Conditions page link', 'wwgcbar_domain'); ?>
							</p>
						</td>
					</tr>

<!-- PRIVACY POLICY OPEN TARGET					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[pp_target]">
								<?php _e('Open link in a new tab', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[pp_target]" type="checkbox" id="wwgcbar_settings[pp_target]" value="1" <?php checked('1', $wwgcbar_options['pp_target']); ?> class="regular-text">
						</td>
					</tr>

<!-- PRIVACY POLICY LINK COLOR					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content_col]">
								<?php _e('Privacy policy link colour', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[content_col_link]" type="text" id="wwgcbar_settings[content_col_link]" value="<?php echo $wwgcbar_options['content_col_link']; ?>" class="regular-text" placeholder="#FFFFFF">
						</td>
					</tr>

<!-- ACCEPT BUTTON TEXT -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[button_1_text]">
								<?php _e('Accept button text', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[button_1_text]" type="text" id="wwgcbar_settings[button_1_text]" value="<?php echo $wwgcbar_options['button_1_text']; ?>" class="regular-text">
						</td>
					</tr>

<!-- ACCEPT BUTTON TEXT COLOR				 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[button_1_col]">
								<?php _e('Accept button text colour', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[button_1_col]" type="text" id="wwgcbar_settings[button_1_col]" value="<?php echo $wwgcbar_options['button_1_col']; ?>" class="regular-text" placeholder="#FFFFFF">
						</td>
					</tr>

<!-- ACCEPT BUTTON BACKGROUND COLOR					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[button_1_bg]">
								<?php _e('Accept button background colour', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[button_1_bg]" type="text" id="wwgcbar_settings[button_1_bg]" value="<?php echo $wwgcbar_options['button_1_bg']; ?>" class="regular-text" placeholder="#000000">
						</td>
					</tr>
<!-- ACCEPT BUTTON END -->

<!-- SETTINGS BUTTON TEXT -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[button_2_text]">
								<?php _e('Settings button text', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[button_2_text]" type="text" id="wwgcbar_settings[button_2_text]" value="<?php echo $wwgcbar_options['button_2_text']; ?>" class="regular-text">
						</td>
					</tr>

<!-- MORE INFO BUTTON TEXT COLOR					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[button_2_col]">
								<?php _e('More information button text colour', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[button_2_col]" type="text" id="wwgcbar_settings[button_2_text]" value="<?php echo $wwgcbar_options['button_2_col']; ?>" class="regular-text" placeholder="#FFFFFF">
						</td>
					</tr>

<!-- MORE INFO BUTTON BACKGROUND COLOR					 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[button_2_bg]">
								<?php _e('More information button background colour', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[button_2_bg]" type="text" id="wwgcbar_settings[button_2_bg]" value="<?php echo $wwgcbar_options['button_2_bg']; ?>" class="regular-text" placeholder="#000000">
						</td>
					</tr>
<!-- MORE INFO BUTTON END -->

<!-- SWAP BUTTONS PLACES -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[buttons_swap]">
								<?php _e('Swap buttons', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<input name="wwgcbar_settings[buttons_swap]" type="checkbox" id="wwgcbar_settings[buttons_swap]" value="1" <?php checked('1', $wwgcbar_options['buttons_swap']); ?> class="regular-text">
						</td>
					</tr>

<!-- SETTINGS MODAL					 -->

<!-- TEXT CONTENT 1 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content1]">
								<?php _e('Policy overview main text part 1', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<textarea name="wwgcbar_settings[content1]" id="wwgcbar_settings[content1]" class="regular-text"><?php echo $wwgcbar_options['content1'] ?></textarea>
						</td>
					</tr>

					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content12]">
								<?php _e('Policy overview main text part 2', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<textarea name="wwgcbar_settings[content12]" id="wwgcbar_settings[content12]" class="regular-text"><?php echo $wwgcbar_options['content12'] ?></textarea>
						</td>
					</tr>

<!-- TEXT CONTENT 2 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content2]">
								<?php _e('Necessary cookies text', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<textarea name="wwgcbar_settings[content2]" id="wwgcbar_settings[content2]" class="regular-text"><?php echo $wwgcbar_options['content2'] ?></textarea>
						</td>
					</tr>

<!-- TEXT CONTENT 1 -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[content3]">
								<?php _e('Non-Necessary cookies text', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<textarea name="wwgcbar_settings[content3]" id="wwgcbar_settings[content3]" class="regular-text"><?php echo $wwgcbar_options['content3'] ?></textarea>
						</td>
					</tr>

<!-- COOKIE BAR SETTINGS BUTTON SHORTCODE -->
					<tr>
						<th scope="row">
							<label for="wwgcbar_settings[cookie_shortcode]">
								<?php _e('Show cookie bar button shortcode', 'wwgcbar_domain'); ?>
							</label>
						</th>
						<td>
							<div>
								<input class="regular-text" type="text" readonly value="[wwgcbar]" />
							</div>
							<br>
							<div>
								<label>Default button code</label>
								<br>
								<input class="regular-text" type="text" readonly value='<a id="wwgcbar-collapsed" href="#">Cookies</a>' />
								<br><br>
								<textarea name="wwgcbar_settings[cookie_shortcode]" id="wwgcbar_settings[cookie_shortcode]" class="regular-text"><?php echo $wwgcbar_options['cookie_shortcode'] ?></textarea>
							</div>



						</td>
					</tr>



<!-- FORM END					 -->
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save changes', 'wwgcbar_domain'); ?>" />
			</p>
		</form>
	</div>
	<div class="wwgcbar-footer"></div>
</div>

<style>

.wwgcbar-content table tr {
	padding: 20px 0;
	border-bottom: 2px solid #ddd;
}
.wwgcbar-content p.submit {
	margin-top: 30px !important;
}
</style>

	<?php
	echo ob_get_clean();
}


// REGISTER SETTINGS
function wwgcbar_register_settings() {
	register_setting('wwgcbar_settings_group', 'wwgcbar_settings');
}

add_action('admin_init', 'wwgcbar_register_settings');
