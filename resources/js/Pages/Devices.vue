<template>
<div>
    <div class="flex flex-inline gap-8 p-10">

        <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Device Name</label>
        <div class="mt-1">
            <input v-model="device.name" type="text" name="email" id="email" class="py-3 bg-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
        </div>
        </div>

        <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Device State</label>
        <div class="mt-1">
            <input v-model="device.state" disabled type="text" name="email" id="email" class="py-3 bg-gray-200 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
        </div>
        </div>

        <div>
        <button @click="getState" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Show Device State  
        </button>

        </div>

    </div>
</div>    
</template>

<script>

export default {
  props: [
    'deviceState',
    'deviceStateId'
  ],
  components: {
  },
  data(){
    return{
      showChannels:false,
      device:{
          name: '',
          state: ''
      }
    }     
  },
  methods:{
    getState(){
        this.$inertia.post(`/deviceStates/${this.device.name}`, this.device, {
            onSuccess: (response) => {
            console.log(response)
            this.device.state = response.props.deviceStateId.state
            },
            onError: (errors) => {
            console.log(errors)
            },
        })
    }

  }
}
</script>