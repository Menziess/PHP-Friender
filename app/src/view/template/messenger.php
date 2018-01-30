
<? if (isset($messages)): ?>
<ul data-ajax-container class="chatbox">
	<? foreach ($messages as $message) { ?>
		<li data-ajax-id="<? echo $message['id'] ?>">
			<? echo $message['first_name'] . ': ' . $message['message'] . $message['time'];
			print_r($message)?>
		</li>
	<? } ?>
</ul>
<? else: ?>
Nog geen berichten.. Stuur een bericht om jullie activiteit te plannen!
<? endif; ?>

<form method="POST" data-ajax-form
	action="/conversation/<? echo $conversation_id ?>">

	<input type="hidden" name="_method" value="PUT">
	<input data-ajax-input
		name="message" type="text"
		placeholder="Typ een bericht..." autocomplete="off" />
	<input type="submit" value="Verstuur">
</form>
