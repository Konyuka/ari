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
                Channel ID's
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Resource
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                State
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Technology
              </th>
            </tr>
          </thead>
          <tbody>


  

            <!-- Odd row -->
            <tr class="bg-white" v-for="data in endpoints" :key="data.index">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{data.channel_ids}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{data.resource}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ data.state }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  {{ data.technology }}
              </td>
              
            </tr>

            <!-- More people... -->
          </tbody>
        </table>
      </div>

      <div class="flex space-x-2 px-20 flex-inline mt-5 justify-items-center">
        <button @click="showSipOnly" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          SIP Only
        </button>
        <button @click="showIaxOnly" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          IAX2 Only
        </button>
        <button @click="showAll" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Show All
        </button>
      </div>

      <div class="flex space-x-2 px-20 flex-inline mt-5 justify-items-center">
        <button @click="filterEndpoint" type="button" class="ml-40 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Filter Specific Endpoint
        </button>
        
        <div class="w-44">
          <label for="email" class="block text-sm font-medium text-gray-700">Tech</label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input v-model="filter.tech" type="text" name="email" id="email" class="bg-gray-200 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-black rounded-md">
          </div>
        </div>

        <div class="w-44">
          <label for="email" class="block text-sm font-medium text-gray-700">Resource</label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <input v-model="filter.resource" type="text" name="email" id="email" class="bg-gray-200 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-black rounded-md">
          </div>
        </div>
      </div>


      <div  class="mt-10 px-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Channel ID's
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Resource
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                State
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Technology
              </th>
            </tr>
          </thead>
          <tbody>


  

            <!-- Odd row -->
            <tr class="bg-white" v-for="data in endpointTech" :key="data.index">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{data.channel_ids}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{data.resource}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ data.state }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  {{ data.technology }}
              </td>
              
            </tr>

            <!-- More people... -->
          </tbody>
        </table>
      </div>

      <div  class="mt-10 px-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Channel ID's
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Resource
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                State
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Technology
              </th>
            </tr>
          </thead>
          <tbody>


  

            <!-- Odd row -->
            <tr class="bg-white">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{endpoints.channel_ids}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{endpoints.resource}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ endpoints.state }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  {{ endpoints.technology }}
              </td>
              
            </tr>

            <!-- More people... -->
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

  
</div>    
</template>

<script>

export default {
  props: [
    'endpoints',
    'endpointTech'
  ],
  components: {
  },
  data(){
    return{
      filter:{
        tech:'',
        resource:'',
      },
      showChannels:false,
      filterWithTech: false,
      tech:{
        type:'',
      }
    }     
  },
  methods:{
    filterEndpoint(){
      this.$inertia.post(`/endpoints/${this.filter.type}/${this.filter.resource}`, this.filter, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    showAll(){
      this.$inertia.get(`/endpoints`, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })
    },
    showIaxOnly(){
      this.tech.type = 'IAX2'
      this.$inertia.post(`/endpoints/${this.tech.type}`, this.tech, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })

      this.filterWithTech = true
    },
    showSipOnly(){
      this.tech.type = 'SIP'
      this.$inertia.post(`/endpoints/${this.tech.type}`, this.tech, {
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