<h2>New Contact Message</h2>

<p><strong>Name:</strong> {{ $contact_data['name'] }}</p>
<p><strong>Email:</strong> {{ $contact_data['email'] }}</p>

<p><strong>Message:</strong></p>
<p>{{ $contact_data['message'] }}</p>

<p><strong>Purpose:</strong> 
    @if($contact_data['purpose'] === 'issue')
        Contacting to raise an issue in content of website
    @elseif($contact_data['purpose'] === 'getintouch')
        Contacting to get in touch with Kemuri
    @endif
</p>

@if(!empty($contact_data['issue_description']))
    <p><strong>Issue Description:</strong></p>
    <p>{{ $contact_data['issue_description'] }}</p>
@endif

@if(!empty($contact_data['contacting_from']))
    <p><strong>Contacting From:</strong> 
        @if($contact_data['contacting_from'] === 'individual')
            I am an individual and not part of any organization
        @elseif($contact_data['contacting_from'] === 'company')
            I am part of a company
        @endif
    </p>
@endif

@if(!empty($contact_data['company_name']))
    <p><strong>Company Name:</strong> {{ $contact_data['company_name'] }}</p>
@endif
