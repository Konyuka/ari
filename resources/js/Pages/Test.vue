<template>
<div>
  
<p>{{context}}</p>
  
</div>    
</template>

<script>

export default {
  props: [
    'context',
  ],
  components: {
  },
  data(){
    return{
      showChannels:false,
    }     
  },
  methods:{
    showChannelFunc(){
      this.showChannels = true
    }
    
  }
}
</script>