<h2>Novo contacto recebido</h2>

<p><strong>Nome:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Assunto:</strong> {{ $contact->subject }}</p>

<p>{{ $contact->message }}</p>

<hr>
<small>
IP: {{ $contact->ip_address }} <br>
User Agent: {{ $contact->user_agent }}
</small>
