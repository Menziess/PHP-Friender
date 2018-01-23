
<? if (isset($message) || isset($errors)): ?>
	<div class="full center">
		<? if (isset($message)): ?>
			<span style="color: var(--success);">
				<? echo $message ?? "" ?>
			</span>
		<? endif; ?>
		<? if (isset($errors)): ?>
			<ul style="padding: 0; list-style-type: none;">
				<? foreach ($errors as $error) { ?>
					<span class="error">
						<? echo $error  ?>
					</span>
				<? } ?>
			</ul>
		<? endif; ?>
	</div>
<? endif; ?>