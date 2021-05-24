<template>
<div>
  <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col px-10 py-10">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="px-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                State
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Caller
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Connected
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Account Code
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Dialplan
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Creation TIme
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Language
              </th>
            </tr>
          </thead>
          <tbody>


  

            <!-- Odd row -->
            <tr class="bg-white" v-for="data in response" :key="data.id">
              <td @click="channelIdFunc(data.id)" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{data.id}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{data.name}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{data.state}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <svg @click="showCallerFunc(data.caller)" class="w-6 h-6 text-blue-400 hover:text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <svg @click="showConnectedFunc(data.connected)" class="w-6 h-6 text-blue-400 hover:text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ data.accountcode }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <svg @click="showDialplanFunc(data.dialplan)" class="w-6 h-6 text-blue-400 hover:text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ data.creationtime }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ data.language }}
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="flex-inline pb-10">
  <!-- Post to Channel -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Create Channel</label>
    <div class="mt-1">
      <input v-model="call.callExt" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="makeCall" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Proceed
    </button>
  </div>

  </div>
</div>

<!-- Create Channel With Specific ID -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Call Extension</label>
    <div class="mt-1">
      <input v-model="call.callExt" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">Channel ID</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="makeCallwithChannelID" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Proceed
    </button>
  </div>

  </div>
</div>

<!-- Create a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Create a Channel</label>
    <div class="mt-1">
      <input v-model="createChannel.ext" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="channelCreate" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Proceed
    </button>
  </div>

  </div>
</div>

<!-- Resume a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Resume Priority</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="resumeChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Resume
    </button>
  </div>

  </div>
</div>

<!-- Transfer channel between Stasis apps -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Channel ID</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">Statis App</label>
    <div class="mt-1">
      <input v-model="call.app" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="transferChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Transfer App
    </button>
  </div>

  </div>
</div>

<!-- Transfer call to another extension -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Channel ID</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">Transfer Extension</label>
    <div class="mt-1">
      <input v-model="call.callExt" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="transferCall" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Transfer Call
    </button>
  </div>

  </div>
</div>

<!-- Answer a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Create a Channel</label>
    <div class="mt-1">
      <input v-model="call.callExt" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="answerChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Answer
    </button>
  </div>

  </div>
</div>

<!-- Ring a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Ring a Channel</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="ringChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Ring
    </button>
  </div>

  </div>
</div>

<!-- Send DTMF -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Channel ID</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">DTMF Value</label>
    <div class="mt-1">
      <input v-model="call.dtmf" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="sendDTMF" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Transfer Call
    </button>
  </div>

  </div>
</div>

<!-- Mute Channel -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Channel ID</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">Mute Mode</label>
    <div class="mt-1">
      <select v-model="call.muteMode" id="location" name="location" class="bg-gray-300 mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
        <option value="both">Both</option>
        <option value="in">In</option>
        <option value="out">Out</option>
      </select>
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="muteChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Transfer Call
    </button>
  </div>

  </div>
</div>

<!-- Hold a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Hold a Channel</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="holdChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Hold
    </button>
  </div>

  </div>
</div>

<!-- Music On Hold a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Music on Hold a Channel</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="mohChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Music on Hold
    </button>
  </div>

  </div>
</div>

<!-- Silence a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Music on Hold a Channel</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="silenceChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Silence Channel
    </button>
  </div>

  </div>
</div>

<!-- Silence a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Record Channel</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="recordChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Record Channel
    </button>
  </div>

  </div>
</div>

<!-- Dial a channel -->
<div class="mt-10 ">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Dial Channel</label>
    <div class="mt-1">
      <input v-model="call.channelID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="dialChannel" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Dial Channel
    </button>
  </div>

  </div>
</div>



</div>


<!-- Caller Modal -->
<div v-if="showCaller" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button @click="showCaller = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="sr-only">Close</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="sm:flex sm:items-start">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
            Caller Object
          </h3>
          <div class="mt-2">
            <div class="flex-row">  
              <p>Name: {{ this.caller.name }} </p>
              <p>Number: {{ this.caller.number }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Connected Modal -->
<div v-if="showConnected" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button @click="showConnected = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="sr-only">Close</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="sm:flex sm:items-start">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
            Caller Object
          </h3>
          <div class="mt-2">
            <div class="flex-row">  
              <p>Name: {{ this.connected.name }} </p>
              <p>Number: {{ this.connected.number }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Dialplan Modal -->
<div v-if="showDialplan" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button @click="showDialplan = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="sr-only">Close</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="sm:flex sm:items-start">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
            Dialplan Object
          </h3>
          <div class="mt-2">
            <div class="flex-row">  
              <p>App_Data: {{ this.dialplan.app_data }} </p>
              <p>App_Name: {{ this.dialplan.app_name }} </p>
              <p>Context: {{ this.dialplan.context }} </p>
              <p>Exten: {{ this.dialplan.exten }} </p>
              <p>Priority: {{ this.dialplan.priority }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Channel ID Modal -->
<div v-if="showChannelDetails" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button @click="showChannelDetails = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="sr-only">Close</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="sm:flex sm:items-start">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
            Show Channel Variable
          </h3>
          <div>
           
          <div class="">
            <label for="location" class="block text-sm font-medium text-gray-700">Variable</label>
            <select v-model="getChannelData.variable" id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              <option value="CONTEXT">CONTEXT</option>
              <option value="CHANNEL">CHANNEL</option>
            </select>
            <button @click="getVaribaleResult" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Show
            </button>
          </div>

          </div>
          <div class="mt-2">
            <div class="flex-row">  
              <p>Result: {{ this.dialplan.app_data }} </p>
            </div>

             <hr> 

            <div class="flex-row">  
              <h1 class="italic text-2xl"> Channel Specific Details </h1>
              <p>Account Code: {{ this.channelDetails.accountcode }}  </p>
              <p>Caller: {{ this.channelDetails.caller }}  </p>
              <p>Connected: {{ this.channelDetails.connected }}  </p>
              <p>Creation Time: {{ this.channelDetails.creationtime }}  </p>
              <p>Dialplan: {{ this.channelDetails.dialplan }} </p>
              <p>ID: {{ this.channelDetails.id }} </p>
              <p>Language:  {{ this.channelDetails.language }} </p>
              <p>Name: {{ this.channelDetails.name }}  </p>
              <p>State:  {{ this.channelDetails.state }} </p>
            </div>

          </div>
          <div class="mt-5">
            <button @click="getRTPStats" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Show RTP Statistic
            </button>
            <div class="mt-3"> 

            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

  
</div>    
</template>

<script>

export default {
  props: [
    'response',
    'bridges',
    'context',
    'channelDetails',
    'rtp',
    'callResponse',
    'createChannelResponse'
  ],
  components: {
  },
  data(){
    return{
      createChannel:{
        ext:''
      },
      call:{
        callExt:'',
        channelID:'',
        app:'',
        dtmf:'',
        muteMode:''
      },
      getChannelData:{
        channelId:'',
        variable:''
      },
      channelVaribale:'',
      showCaller:false,
      showConnected:false,
      showDialplan:false,
      showChannelDetails:false,
      caller:{
        name:'',
        number:'', 
      },
      connected:{
        name:'',
        number:''
      },
      dialplan:{
        app_data:'',
        app_name:'',
        context:'',
        exten:'',
        priority:''
      }
    }
  },
  methods:{
    dialChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/dial`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    recordChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/record`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    silenceChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/silence`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    mohChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/moh`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    holdChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/hold`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    muteChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/mute`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    sendDTMF(){
      this.$inertia.post(`/channels/${this.call.channelId}/ring`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    ringChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/ring`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    answerChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/answer`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    transferCall(){
      this.$inertia.post(`/channels/${this.call.channelId}/redirect`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    transferChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/move`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    resumeChannel(){
      this.$inertia.post(`/channels/${this.call.channelId}/continue`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    channelCreate(){
      this.$inertia.post(`/channels/create`, this.createChannel, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    makeCallwithChannelID(){
      this.$inertia.post(`/channels/${this.call.channelId}`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    makeCall(){
      this.$inertia.post(`/channels`, this.call, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    getRTPStats(){
      this.$inertia.post(`/channels/${this.getChannelData.channelId}/rtp_statistics`, this.getChannelData.channelId, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    getVaribaleResult(){
      console.log(this.getChannelData.variable)
      this.$inertia.post(`/channels/${this.getChannelData.channelId}/${this.getChannelData.variable}`, this.getChannelData.channelId, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
        
    },
    channelIdFunc(data){
      this.showChannelDetails = true
      this.getChannelData.channelId = data
      this.$inertia.post(`/channel/${this.getChannelData.channelId}`, this.getChannelData, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    showDialplanFunc(data){
      this.dialplan.app_date = data.app_data
      this.dialplan.app_name = data.app_name
      this.dialplan.context = data.context
      this.dialplan.exten = data.exten
      this.dialplan.priority = data.priority
      this.showDialplan = true
    },
    showConnectedFunc(data){
      this.connected.name = data.name
      this.connected.number = data.number
      this.showConnected = true
    },
    showCallerFunc(data){
      this.caller.name = data.name
      this.caller.number = data.number
      this.showCaller = true
    }
    
  }
}
</script>