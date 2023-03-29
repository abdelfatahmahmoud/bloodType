{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('notifecations_settings_text', 'Notifecations_settings_text:') !!}
			{!! Form::text('notifecations_settings_text') !!}
		</li>
		<li>
			{!! Form::label('about_app', 'About_app:') !!}
			{!! Form::textarea('about_app') !!}
		</li>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('fb_link', 'Fb_link:') !!}
			{!! Form::text('fb_link') !!}
		</li>
		<li>
			{!! Form::label('tw_link', 'Tw_link:') !!}
			{!! Form::text('tw_link') !!}
		</li>
		<li>
			{!! Form::label('insta', 'Insta:') !!}
			{!! Form::text('insta') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}