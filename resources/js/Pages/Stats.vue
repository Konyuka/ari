<template>
    <div>
    
        <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Endpoints
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        States
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Channels
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Bridges
                    </th>
                    <th scope="col" class="relative px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">
                        Details
                        <span class="sr-only">More Info</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="data in endpoint" :key="data.index">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                            {{data.resource}}
                            </div>
                            <div class="text-sm text-gray-500">
                            <span class="px-1 inline-flex text-xs leading-5 font-semibold rounded-md bg-green-100 text-green-800">
                             {{ data.state }}
                            </span>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900" v-for="(data, index) in dynamicData" :key="index"> {{ data }} </div>
                        <div class="text-sm text-gray-500">{{data.channel_ids}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Admin
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    </tr>

                    <!-- More people... -->
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>

    </div>    
</template>

<script>

export default {
  props: [
    'endpoint',
    'channel',
    'bridge'
  ],
  components: {
  },
  mounted(){
       
  },
  created() {
    this.setData()
    this.checkChannels()
    // this.channelName()
  },
  watch:{

  },
  computed:{
    channels() {
      return this.$store.state.channels
    },  
    endpoints() {
      return this.$store.state.endpoints
    }, 
    hasChannel(){
    //   return (this.endpoint. != 'LOGIN') ? true : false      
    }, 
  },
  data(){
    return{
      showChannelId:false, 
      channelIds:[],
      endpointIds:[], 
      dynamicIds:[],
      resources:[],
      dynamicData:[],
      dataSet: {
        "600": "Has ID",
        "700": "Has ID"
      },
    }     
  },
  methods:{
    setData(){
      this.$store.dispatch('setChannels', this.channel)
      this.$store.dispatch('setEndpoints', this.endpoint)
    },
    channelName(){

        for (let i = 0; i < this.endpoints.length; t++) {

        var EndpointsIds = this.endpoints[i++].channel_ids

        if(EndpointsIds == null){

        }

        
        var callBackTime = this.moment(timeArrs[i++]);
        var currentTime = this.moment().add(180, 'seconds');

        if (callBackTime < currentTime) {
          this.dueCallBacks = true
        } else if (callBackTime > currentTime) {
          this.dueCallBacks = false
        } else {
          console.log("usiblink")
        }

      }

    },
    checkChannels(){

      let resource = []
      for(let r = 0; r < this.endpoint.length; r++){
        resource.push(this.endpoint[r].resource)
      }
      this.resources = resource

      let items = this.resources
      this.dynamicData = items.map( data => this.dataSet[data] )

    }
  }
}
</script>