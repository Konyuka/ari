<template>
<div>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="h-screen flex overflow-hidden bg-gray-100">

  <!-- Static sidebar for desktop -->
  <div class="hidden bg-indigo-700 md:flex md:flex-shrink-0">
    <div class="flex flex-col w-96">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-col h-0 flex-1">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
          <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
          </div>
          <nav class="mt-5 flex-1 px-2 space-y-1">
           
           <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
             Call Extension 500
           </button>

           <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
             Call Extension 600
           </button>

          </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
          <a href="#" class="flex-shrink-0 w-full group block">
            <div class="flex items-center">
              
              <div class="ml-3">
                <p class="text-sm font-medium text-white">
                  Wilphrosa
                </p>
                <p class="text-xs font-medium text-indigo-200 group-hover:text-white">
                  Logout
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="flex flex-col w-0 flex-1 overflow-hidden">
    <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
      <button class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
      <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <h1 class="text-2xl font-semibold text-gray-900">I-Frame</h1>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <!-- Replace with your content -->
          <div class="py-4">
            <div class="border-4 border-dashed border-gray-200 rounded-lg h-96"></div>
          </div>
          <!-- /End replace -->
        </div>
      </div>
    </main>
  </div>
</div>
    
</div>   
</template>

<script>

export default {

  components: {

  },
}
</script>