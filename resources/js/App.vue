<template>
  <div class="w-screen flex flex-col min-h-screen overflow-y-hidden">
    <div class="p-2 border-b-2">
      <router-link class="flex items-center" :to="{ name: 'showevents.index'}">
        <svg class="w-14 h-14 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
          <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
        <div class="text-2xl font-semibold px-2">Home</div>
      </router-link>
    </div>
    <div class="w-2/3 mx-auto my-20">
      <router-view></router-view>
    </div>
  </div>
</template>
<script setup>
</script>
