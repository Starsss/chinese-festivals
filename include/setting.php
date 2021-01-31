<div class="wrap">
	<h2>中国节日 插件设置</h2>
	<?php if ( isset( $_REQUEST['settings-updated'] ) ) {
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>设置已保存。</strong></p></div>';
	} ?>
	<form method="post" action="options.php">
		<?php settings_fields( 'festival_setting_group' ); ?>
		<table class="form-table">
			<tbody>
            <tr valign="top">
				<th scope="row"><label>节日灯笼</label></th>
				<td>
					<p>
						<label title="隐藏">
							<input type="radio" name="festival_setting[lantern]"
							       value="0" <?php if ( $this->settings( 'lantern' ) == 0 ) {
								echo 'checked="checked"';
							} ?>/>
							<span>隐藏</span>
						</label>
					</p>

					<p>
						<label title="显示">
							<input type="radio" name="festival_setting[lantern]"
							       value="1" <?php if ( $this->settings( 'lantern' ) == 1 ) {
								echo 'checked="checked"';
							} ?>/>
							<span>显示</span>
						</label>
					</p>

					<p class="description">提示：<strong>春节来个灯笼高高挂吧</strong></p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label>灯笼左侧文字提示</label></th>
				<td>
					<p><input type="text" class="regular-text" name="festival_setting[lantern_l]"
					          value="<?php echo $this->settings( 'lantern_l' ); ?>"/></p>

					<p class="description">默认显示：<strong>新年</strong> 为空则不显示任何文字。</p>
				</td>
			</tr>
            <tr valign="top">
				<th scope="row"><label>灯笼右侧文字提示</label></th>
				<td>
					<p><input type="text" class="regular-text" name="festival_setting[lantern_r]"
					          value="<?php echo $this->settings( 'lantern_r' ); ?>"/></p>

					<p class="description">默认显示：<strong>快乐</strong> 为空则不显示任何文字。</p>
				</td>
			</tr>
            <tr valign="top">
				<th scope="row"><label>节日背景</label></th>
				<td>
					<p>
						<label title="隐藏">
							<input type="radio" name="festival_setting[background]"
							       value="0" <?php if ( $this->settings( 'background' ) == 0 ) {
								echo 'checked="checked"';
							} ?>/>
							<span>隐藏</span>
						</label>
					</p>

					<p>
						<label title="升起">
							<input type="radio" name="festival_setting[background]"
							       value="1" <?php if ( $this->settings( 'background' ) == 1 ) {
								echo 'checked="checked"';
							} ?>/>
							<span>福字自底向上升起</span>
						</label>
					</p>

                    <p>
						<label title="旋转">
							<input type="radio" name="festival_setting[background]"
							       value="2" <?php if ( $this->settings( 'background' ) == 2 ) {
								echo 'checked="checked"';
							} ?>/>
							<span>福字空中旋转</span>
						</label>
					</p>

                    <p class="description">提示：<strong>沾沾福气吧</strong></p>

				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label>z-index</label></th>
				<td>
					<p><input type="text" class="regular-text" name="festival_setting[zindex]"
					          value="<?php echo $this->settings( 'zindex' ); ?>"/></p>

					<p class="description">默认显示：<strong>-1</strong> 当网站看不到福字可以设置大一点。</p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"></th>
				<td>
					<input type="submit" class="button-primary" name="save" value="保存"/>
				</td>
			</tr>
			</tbody>
		</table>
	</form>
	<style>label{margin-right:8px}input[type=checkbox],input[type=radio]{margin-right:0!important}.hermit-radio-default input[type=radio]{border-color:#5895be}.hermit-radio-default{color:#5895be}.hermit-radio-default input[type=radio]:checked:before{background-color:#5895be}.hermit-radio-red{color:#dd4b39}.hermit-radio-red input[type=radio]{border-color:#dd4b39}.hermit-radio-red input[type=radio]:checked:before{background-color:#dd4b39}.hermit-radio-blue{color:#5cb85c}.hermit-radio-blue input[type=radio]{border-color:#5cb85c}.hermit-radio-blue input[type=radio]:checked:before{background-color:#5cb85c}.hermit-radio-yellow{color:#f0ad4e}.hermit-radio-yellow input[type=radio]{border-color:#f0ad4e}.hermit-radio-yellow input[type=radio]:checked:before{background-color:#f0ad4e}.hermit-radio-pink{color:#f489ad}.hermit-radio-pink input[type=radio]{border-color:#f489ad}.hermit-radio-pink input[type=radio]:checked:before{background-color:#f489ad}.hermit-radio-purple{color:orchid}.hermit-radio-purple input[type=radio]{border-color:orchid}.hermit-radio-purple input[type=radio]:checked:before{background-color:orchid}.hermit-radio-black{color:#aaa}.hermit-radio-black input[type=radio]:checked:before{background-color:#aaa}</style>
</div>