<template>
  <div class="flex p-2 items-center bg-gray-800 w-full space-x-3">
    <div class="flex-grow flex-1 text-xl text-white font-semibold">
      Manage Events
    </div>
    <router-link :to="{ name: 'showevents.create' }"
      class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center"
    >
      <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
        <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>Add New Event</span>
    </router-link>
  </div>
  <div>
    <table class="table-auto w-full text-center text-sm font-light">
      <thead>
        <tr class="border-b font-medium dark:border-neutral-500 dark:text-neutral-800">
          <th scope="col" class="px-6 py-4">#</th>
          <th scope="col" class="px-6 py-4">Image</th>
          <th scope="col" class="px-6 py-4">Title</th>
          <th scope="col" class="px-6 py-4">Attractions</th>
          <th scope="col" class="px-6 py-4">Description</th>
          <th scope="col" class="px-6 py-4">Start Date</th>
          <th scope="col" class="px-6 py-4">Price</th>
          <th scope="col" class="px-6 py-4">Actions</th>
        </tr>
      </thead>
      <tbody class="border-b bg-gray-50 dark:border-neutral-500">
        <tr
          class="hover:bg-gray-200"
          v-for="showEvent in laravelData.data"
          :key="showEvent.id"
        >
          <td class="whitespace-nowrap px-6 py-4 font-medium">{{ showEvent.id }}</td>
          <td class="whitespace-nowrap px-6 py-4">{{ showEvent.img_path }}</td>
          <td class="whitespace-nowrap px-6 py-4">{{ showEvent.title }}</td>
          <td class="whitespace-nowrap px-6 py-4">{{ showEvent.attractions }}</td>
          <td class="whitespace-nowrap px-6 py-4">{{ showEvent.description }}</td>
          <td class="whitespace-nowrap px-6 py-4">{{ showEvent.start_date }}</td>
          <td class="whitespace-nowrap px-6 py-4">{{ showEvent.price }}</td>
          <td class="whitespace-nowrap px-6 py-4 space-x-3">
            <button 
              @click=""
              class="bg-yellow-800 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-flex items-center"
            >
              Edit
            </button> 
            <button 
              @click="destroyShowEvent(showEvent.id)"
              class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <TailwindPagination
      :data="laravelData"
      @pagination-change-page="getShowEvents"
    />
  </div>
</template>

<script setup>
  import { ref, onMounted } from 'vue';
  import { TailwindPagination } from 'laravel-vue-pagination';
  const laravelData = ref({});

  const getShowEvents = async (page = 1) => {
    const response = await axios.get(`api/show-events?page=${page}`);
    laravelData.value = await response.data;
  }

  const destroyShowEvent = async (id) => {
    if(!window.confirm('Are you sure?')) {
      return;
    }
    await axios.delete(`api/show-events/${id}`);
    await getShowEvents();
  }

  onMounted(getShowEvents);
  


</script>
