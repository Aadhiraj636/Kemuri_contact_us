<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-50">

  <!-- Contact Form Section -->
  <div class="container mx-auto px-6 py-12">
    <div class="flex justify-center">
      <div class="bg-white shadow-md rounded-lg p-6 w-full md:w-2/3 lg:w-1/2">
        <form class="space-y-6" action="{{ route('send.contact_mail') }}" method="post">
          @csrf
          @if(session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline">{{ session()->get('success') }}</span>
            </div>
          @endif

          <fieldset>
            <legend class="text-center text-xl font-semibold text-gray-800 mb-4">Contact Us</legend>

            <div class="space-y-1">
              <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
              <input type="text" id="name" name="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required minlength="1" placeholder="Your name">
            </div>

            <div class="space-y-1">
              <label for="email" class="block text-sm font-medium text-gray-700">Your E-mail</label>
              <input type="email" id="email" name="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required placeholder="Your email">
            </div>

            <div class="space-y-1">
              <label for="message" class="block text-sm font-medium text-gray-700">Your message</label>
              <textarea id="message" name="message" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required placeholder="Please enter your message here..."></textarea>
            </div>

            <div class="space-y-1">
              <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
              <select name="purpose" id="purpose" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                <option value="">-- Select Purpose --</option>
                <option value="issue">Contacting to raise an issue in content of website</option>
                <option value="getintouch">Contacting to get in touch with Kemuri</option>
              </select>
            </div>

            <div id="issue_description_group" class="space-y-1 hidden">
              <label for="issue_description" class="block text-sm font-medium text-gray-700">Short Description</label>
              <textarea name="issue_description" id="issue_description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Describe the issue (optional)"></textarea>
            </div>

            <div id="contacting_from_group" class="space-y-2 hidden">
              <label class="block text-sm font-medium text-gray-700">Contacting From</label>
              <div class="flex items-center">
                <input type="radio" name="contacting_from" value="individual" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" required>
                <label class="ml-2 block text-sm text-gray-700">I am an individual and not part of any organization</label>
              </div>
              <div class="flex items-center">
                <input type="radio" name="contacting_from" value="company" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" required>
                <label class="ml-2 block text-sm text-gray-700">I am part of a company</label>
              </div>
            </div>

            <div id="company_name_group" class="space-y-1 hidden">
              <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
              <input type="text" id="company_name" name="company_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter your company name">
            </div>

            <div class="text-right">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
            </div>

          </fieldset>
        </form>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function () {
      $('#purpose').change(function () {
          let purpose = $(this).val();
          if (purpose === 'issue') {
              $('#issue_description_group').removeClass('hidden');
              $('#contacting_from_group').removeClass('hidden');
          } else {
              $('#issue_description_group').addClass('hidden');
              $('#contacting_from_group').addClass('hidden');
              $('#company_name_group').addClass('hidden');
              $('input[name="contacting_from"]').prop('checked', false);
              $('#company_name').val('');
          }
      });

      $('input[name="contacting_from"]').change(function () {
          if ($(this).val() === 'company') {
              $('#company_name_group').removeClass('hidden');
              $('#company_name').prop('required', true);
          } else {
              $('#company_name_group').addClass('hidden');
              $('#company_name').prop('required', false).val('');
          }
      });
  });
  </script>

</body>
</html>
