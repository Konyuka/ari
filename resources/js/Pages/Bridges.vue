<template>
<div>
  <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="px-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Bridge_Class
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Bridge_Type
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Channels
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                creationtime
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                creator
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Technology
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Video_Mode
              </th>
            </tr>
          </thead>
          <tbody>

            <!-- Odd row -->
            <tr class="bg-white" v-for="data in bridges" :key="data.id">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{data.bridge_class}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{data.bridge_type}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <!-- {{ data.channels}} <br> -->
                <svg @click="showChannelFunc()" class="w-6 h-6 text-blue-400 hover:text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ data.creationtime }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  {{ data.creator }}
              </td>
              <td @click="showBridgeDetails(data.id)" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ data.id }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  {{ data.name }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ data.technology }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ data.video_mode }}
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Channel Modal -->
<div v-if="showChannels" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button @click="showChannels = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
            Bridge Channels Object
          </h3>
          <div class="mt-2">
            <div class="flex-row" v-for="data in bridges" :key="data.index">  
              <p>Bridged Channels: {{ data.channels }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Channel ID Modal -->
<div v-if="showBridgeID" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button @click="showBridgeID = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
            Bridge Channels Object
          </h3>
          <div class="mt-2">
            <div class="flex-row" >  
              <p>Bridge Class: {{ this.bridgeId.bridge_class }} </p>
              <p>Bridge Type: {{ this.bridgeId.bridge_type }} </p>
              <p>Channels: {{ this.bridgeId.channels }} </p>
              <p>Creation Time: {{ this.bridgeId.creationtime }} </p>
              <p>ID: {{ this.bridgeId.id }} </p>
              <p>Name: {{ this.bridgeId.name }} </p>
              <p>Technology: {{ this.bridgeId.technology }} </p>
              <p>Video Mode: {{ this.bridgeId.video_mode }} </p>
              <p>creator: {{ this.bridgeId.creator }} </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Create Bridge -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Create Bridge</label>
    <div class="mt-1">
      <input v-model="bridge.type" placeholder="mixing, holding, dtmf_events, proxy_media, video_sfu, video_single" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">ID</label>
    <div class="mt-1">
      <input v-model="bridge.bridgeId" placeholder="ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">Name</label>
    <div class="mt-1">
      <input v-model="bridge.name" placeholder="name" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="makeBridge" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Proceed
    </button>
  </div>

  </div>
</div>

<!-- Update Bridge -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Update Bridge</label>
    <div class="mt-1">
      <input v-model="bridge.type" placeholder="mixing, holding, dtmf_events, proxy_media, video_sfu, video_single" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">ID</label>
    <div class="mt-1">
      <input v-model="bridge.bridgeId" placeholder="ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">Name</label>
    <div class="mt-1">
      <input v-model="bridge.name" placeholder="name" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="updateBridge" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Proceed
    </button>
  </div>

  </div>
</div>

<!-- Update Bridge -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Add Channel</label>
    <div class="mt-1">
      <input v-model="bridge.bridgeId" placeholder="bridge ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">To Bridge</label>
    <div class="mt-1">
      <input v-model="bridge.channelId" placeholder="channel ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="addChannelToBridge" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Add Channel to Bridge
    </button>
  </div>

  </div>
</div>

<!-- Update Bridge -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Remove Channel</label>
    <div class="mt-1">
      <input v-model="bridge.bridgeId" placeholder="bridge ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="w-36 ml-2">
    <label for="email" class="block text-sm font-medium text-gray-700">To Bridge</label>
    <div class="mt-1">
      <input v-model="bridge.channelId" placeholder="channel ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="removeChannelFromBridge" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Remove Channel to Bridge
    </button>
  </div>

  </div>
</div>

<!-- MOH Bridge -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Moh Bridge</label>
    <div class="mt-1">
      <input v-model="bridge.bridgeId" placeholder="bridge ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="mohBridge" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Moh Bridge
    </button>
  </div>

  </div>
</div>

<!-- Record Bridge -->
<div class="mt-10">
  <div class=" flex justify-start">

  <div class="w-36 ml-20">
    <label for="email" class="block text-sm font-medium text-gray-700">Record Bridge</label>
    <div class="mt-1">
      <input v-model="bridge.bridgeId" placeholder="bridge ID" type="text" name="email" id="email" class="bg-gray-300 py-2 px-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
  </div>

  <div class="mt-7 ml-2"> 
    <button  @click="recordBridge" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Record Bridge
    </button>
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
    'bridgeId'
  ],
  components: {
  },
  data(){
    return{
      showChannels:false,
      showBridgeID:false,
      channelDetails:{
        id:''
      },
      bridge:{
        type:'',
        bridgeId:'',
        name:'',
        channelId:'',
        format:''
      }
    }     
  },
  methods:{
    recordBridge(){
      this.$inertia.post(`/bridges/${this.bridge.bridgeId}/record`, this.bridge, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    mohBridge(){
      this.$inertia.post(`/bridges/${this.bridge.bridgeId}/moh`, this.bridge, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    removeChannelFromBridge(){
      this.$inertia.post(`/bridges/${this.bridge.bridgeId}/removeChannel`, this.bridge, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    addChannelToBridge(){
      this.$inertia.post(`/bridges/${this.bridge.bridgeId}/addChannel`, this.bridge, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    updateBridge(){
      this.$inertia.post(`/bridges`, this.bridge, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    makeBridge(){
      this.$inertia.post(`/bridges`, this.bridge, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    showBridgeDetails(IdString){
      this.channelDetails.id = IdString
      this.showBridgeID = true
      this.$inertia.post(`/bridges/${IdString}`, this.channelDetails, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    showChannelFunc(){
      this.showChannels = true
    }
    
  }
}
</script>