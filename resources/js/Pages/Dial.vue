<template>
<div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-indigo-700 h-screen">
  <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
      <span class="block">Click to Dial</span>
    </h2>
    <div class="mt-8 w-36 inline-flex items-center justify-center">
      <input @keyup.enter="submit" v-model="login.ext" placeholder="User Extension" type="text" name="email" id="email" class="bg-white py-4 px-6 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>
    <!-- <div v-bind:class="{'hidden': loginTrue === true, 'block': loginTrue === false}"> -->
      <a v-if="online == '' "  @click="submit" class="mt-2 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
        Login
      </a>
    <!-- </div> -->
    <!-- <div v-bind:class="{'hidden': loginTrue === false, 'block': loginTrue === true}"> -->
      <a  v-if="online == 'ON'" @click="dial" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
        Dial
      </a>
      <a  v-if="online == 'OnCall'" @click="hangUp" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-red-600 hover:bg-indigo-50 sm:w-auto">
        HangUp
      </a>
    <!-- </div> -->
  </div>

  <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
      <span class="block">Dial Outside</span>
    </h2>

    <div class="mt-8 w-36 inline-flex items-center justify-center">
      <input @keyup.enter="callOutside" v-model="out.number" placeholder="User Extension" type="text" name="email" id="email" class="bg-white py-4 px-6 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
    </div>

      <a   @click="callOutside" class="mt-2 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
        Dial
      </a>
    
  </div>

</div>

  
</div>    
</template>

<script>

export default {
  props: [
    'context',
    'dialResponse',
    'ringResponse',
    'bridgeData'
  ],
  components: {
  },
  created(){
    // this.reset()
  },
  computed:{
    online() {
      return this.$store.state.online
    },
  },
  data(){
    return{
      out:{
        number:''
      },
      bridgeParams:{
        bridgeId:'',
        channelId:''
      },
      loginTrue:false,
      login:{
        ext:''
      },
      showChannels:false,
    }     
  },
  methods:{
    callOutside(){

      this.$inertia.post(`/outside`, this.out, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })

    },
    hangUp(){

      this.bridgeParams.bridgeId = localStorage.getItem('bridgeId')
      this.bridgeParams.channelId = this.$store.state.channelDetails.id

      this.$inertia.post(`/dial/bridges/${this.bridgeParams.bridgeId}/removeChannel`, this.bridgeParams, {
        onSuccess: (response) => {
          console.log(response)
          this.$store.dispatch("setOnline", 'ON');
        },
        onError: (errors) => {
          console.log(errors)
        },
      })

    },
    dial(){

      this.bridgeParams.bridgeId = this.login.ext
      this.bridgeParams.channelId = this.$store.state.channelDetails.id
      localStorage.setItem('bridgeId', this.login.ext)

      this.$inertia.post(`/dial/bridges/${this.bridgeParams.bridgeId}/addChannel`, this.bridgeParams, {
        onSuccess: (response) => {
          console.log(response)
          this.$store.dispatch("setOnline", 'OnCall');
        },
        onError: (errors) => {
          console.log(errors)
        },
      })

    },
    giveBridge(){

      this.bridgeParams.bridgeId = localStorage.getItem('extension')
      this.bridgeParams.channelId = this.$store.state.channelDetails.id

      this.$inertia.post(`/dial/bridges/${this.bridgeParams.bridgeId}/addChannel`, this.bridgeParams, {
        onSuccess: (response) => {
          console.log(response)
        },
        onError: (errors) => {
          console.log(errors)
        },
      })

    },
    submit(){

      localStorage.setItem('extension', this.login.ext)

      this.$inertia.post(`/dial/channels/create`, this.login, {
        onSuccess: () => {

          this.$store.dispatch("setChannelDetails", this.dialResponse);

          this.$inertia.post(`/dial/channels/${this.dialResponse.id}/dial`, this.dialResponse, {
            onSuccess: () => {

              this.$store.dispatch("setOnline", 'ON');
              this.giveBridge()
              
            },
            onError: (errors) => {
              console.log(errors)
            },
          })

        },
        onError: (errors) => {
          console.log(errors)
        },
      })

    }
    
  }
}
</script>