<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        body {
            background-color: #f3f4f6; /* Gray background */
        }

        .search-result {
            border: 1px solid #1f2937; /* Black border */
            background-color: #1f2937; /* Black background */
            color: #fff; /* White text */
            border-radius: 6px; /* Rounded corners */
            margin-bottom: 10px; /* Margin between search results */
            padding: 8px 12px; /* Smaller vertical padding */
        }
    </style>

    <script>
        function searchFor(event) {
            event.preventDefault()

            let form = document.querySelector('form')

            fetch('/search', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    query: form.search.value,
                    _token: form._token.value
                })
            }).then(res => res.json())
                .then(data => {
                    let searchResults = document.querySelector('#search-results')
                    searchResults.innerHTML = null

                    Object.values(data.data.data).forEach(record => {
                        searchResults.innerHTML += '<div class="search-result"><h2 class="text-lg font-bold">' + record.title + '</h2><p>Quantity: ' + record.quantity + ' | Price: $' + record.price + '</p></div>'
                    })

                    searchResults.innerHTML += '<small>Search results took: ' + data.duration + ' ... isn\'t that cool?</small>'
                })
                .catch(err => console.log(err))
        }
    </script>
</head>

<body class="flex justify-center items-center h-screen">
<div class="max-w-md w-full p-8 bg-white rounded-lg shadow-md">
    <form onsubmit="searchFor(event)" class="flex flex-col items-center">
        @csrf
        <input id="search" name="search" type="text" placeholder="Search" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-gray-200">
        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
            Search
        </button>
    </form>
    <div id="search-results" class="mt-8">
        <div class="search-result">
            <h2 class="text-lg font-bold">Search Result 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
</div>

</body>

</html>
