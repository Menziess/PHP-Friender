
<? if (isset($messages)): ?>
<ul data-ajax-container class="chat-container">
	<? foreach ($messages as $message) { ?>
		<li data-ajax-id="<? echo $message['id'] ?>"
			class="chat-message"
			>
			<? echo $message['first_name'] . ': ' . $message['message'] ?>
			<br>
			<label style="font-size: 0.6em;"><? echo $message['time'] ?></label>
		</li>
	<? } ?>
</ul>
<? else: ?>
Nog geen berichten.. Stuur een bericht om jullie activiteit te plannen!
<? endif; ?>

<form method="POST" data-ajax-form class="chat-editor"
	action="/conversation/<? echo $conversation_id ?>">

	<input type="hidden" name="_method" value="PUT">
	<input data-ajax-input
		name="message" type="text"
		placeholder="Typ een bericht..." autocomplete="off" />
	<input type="submit" value="Verstuur">
</form>
