<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        .heading1 {
            color: #058fa2;
            font-size: 40px;
        }

        .tas-bg {
            background-color: rgba(255, 255, 255, 0.45);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
    <script type="module">
        import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

        createChat({
                    
                webhookUrl: 'https://n8n-pzlt3bedl8ou.axwy.sumopod.my.id/webhook/9c8f756c-0527-4cda-91be-83baf8f38f3b/chat',
                webhookConfig: {
                    method: 'POST',
                    headers: {}
                },
                target: '#n8n-chat',
                mode: 'window',
                chatInputKey: 'chatInput',
                chatSessionKey: 'sessionId',
                loadPreviousSession: true,
                metadata: {},
                showWelcomeScreen: false,
                allowFileUploads: true,
                theme: 'light',
                defaultLanguage: 'en',
                // initialMessages: [
                //     'Hi there! 👋',
                //     'My name is Nathan. How can I assist you today?'
                // ],
                // i18n: {
                //     en: {
                //         title: 'Hi there! 👋',
                //         subtitle: "Start a chat. We're here to help you 24/7.",
                //         footer: '',
                //         getStarted: 'New Conversation',
                //         inputPlaceholder: 'Type your question..',
                //     },
                // },
                enableStreaming: true,
            
        });
    </script>


    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body style="background-color: #a7cdd5" class="antialiased">
   @filamentScripts
    @vite('resources/js/app.js')
    
    <nav class="sticky top-0 z-50 text-white" style="background-color: #068498;">
        <section class="container mx-auto  p-4 flex flex-col md:flex-row justify-between items-center">
            <a id="link-7-176" class="flex items-center space-x-3 rtl:space-x-reverse" href="/">
                <div class="w-[150px] h-auto">
                    <img id="image-8-176" alt=""
                        src="https://tamanairspa.com/wp-content/uploads/2024/07/logo-tamanair.png" class="h-20 w-auto "
                        srcset="https://tamanairspa.com/wp-content/uploads/2024/07/logo-tamanair.png 500w, https://tamanairspa.com/wp-content/uploads/2024/07/logo-tamanair-300x277.png 300w">
                </div>
            </a>
            <div class="max-w-xl  text-left hidden md:block">
                {{-- <h1 class="text-2xl font-bold underline">
                    Welcome to the Page!
                </h1> --}}
            </div>
        </section>

    </nav>

    <section class="container mx-auto min-h-screen  px-4 justify-between items-center">

    {{ $slot }}
    </section>

    <footer style="background-color: #318897b3; "class=" text-white py-6 mt-10 bottom-0 w-full">
        <div class="container mx-auto  px-4 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
            &copy; 2024 Taman Air Spa. All rights reserved.
            </div>
            <div class="flex space-x-4">
            <a href="#" class="hover:text-gray-400">Home</a>
            <a href="#" class="hover:text-gray-400">About</a>
            <a href="#" class="hover:text-gray-400">Contact</a>
            <a href="#" class="hover:text-gray-400">Privacy Policy</a>
            </div>
        </div>
    </footer>

    
</body>

</html>
