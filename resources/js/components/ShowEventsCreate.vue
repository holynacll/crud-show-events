<template>
  
  <div class="flex flex-col sm:flex-row space-x-10">

    <div class="w-2/3 h-72 lg:flex">
      <!-- img -->
      <!-- <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" :style="`background-image: url()`"> -->
        <img :src="`/images/${form.img_path}`" alt="" class="h-48 lg:h-auto lg:w-64 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden">
      <!-- </div> -->
      <div class="w-2/3 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
          <!-- start date -->
          <p class="text-xl text-gray-600 uppercase font-semibold">{{ getBannerDate }}</p>
          <!-- title -->
          <div class="text-gray-900 font-bold text-xl mb-2 uppercase">{{ form.title || 'title' }}</div> 
          <!-- attractions -->
          <p class="text-gray-700 text-sm py-4 ">{{ form.attractions || 'attractions' }}</p>
           <!-- description -->
           <p class="text-black text-base break-all">{{ form.description || 'description' }}</p>
        </div>
      </div>
    </div>


    <form class="space-y-6 mt-8" @submit.prevent="handleSave()">
      <!-- title input -->
      <div class="space-y-4 rounded-md shadow-sm">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
          Title
        </label>
        <div class="flex flex-col rounded-md sm:max-w-md">
          <input 
            type="text" 
            name="title"
            v-model="form.title" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Write the title here..."
          >
          <p class="text-red-600 p-1" v-for="error in errors.title">{{ error }}</p>
        </div>
      </div>

      <!-- attraction input -->
      <div class="space-y-4 rounded-md shadow-sm">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="attractions">
          Attractions
        </label>
        <div class="flex flex-col rounded-md sm:max-w-md">
          <input 
            type="text" 
            name="attractions"
            v-model="form.attractions" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Write the attractions here..."
          >
          <p class="text-red-600 p-1" v-for="error in errors.attractions">{{ error }}</p>
        </div>
      </div>

      <!-- start date input -->
      <div class="space-y-4 rounded-md shadow-sm">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="datetime">
          Show Datetime
        </label>
        <div class="flex flex-col rounded-md sm:max-w-md">
          <input 
            type="datetime-local" 
            name="datetime"
            v-model="form.start_datetime" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          >
          <p class="text-red-600 p-1" v-for="error in errors.start_datetime">{{ error }}</p>
        </div>
      </div>

      <!-- Description input -->
      <div class="space-y-4 rounded-md shadow-sm">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
          Description
        </label>
        <div class="flex flex-col rounded-md sm:max-w-md">
          <textarea 
            name="description" 
            rows="4"
            v-model="form.description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
            placeholder="Write the description here...">
          </textarea>
          <p class="text-red-600 p-1" v-for="error in errors.description">{{ error }}</p>
        </div>
      </div>

      <!-- price input -->
      <div class="space-y-4 rounded-md shadow-sm">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
          Price
        </label>
        <div class="flex flex-col rounded-md sm:max-w-md">
          <input 
            type="number"
            step="0.01"
            name="price"
            v-model="form.price" 
            class="shadow appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Write the price here..."
          >
          <p class="text-red-600 p-1" v-for="error in errors.price">{{ error }}</p>
        </div>
      </div>

      <!-- image input -->
      <div class="space-y-4 rounded-md shadow-sm">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="img">
          Image
        </label>
        <div class="flex flex-col rounded-md sm:max-w-md">
          <input 
            type="file" 
            name="img"
            @change="handleFileUpload" 
            class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          >
          <p class="text-red-600 p-1" v-for="error in errors.img_path">{{ error }}</p>
        </div>
      </div>


     
      <button
        type="submit" 
        class="bg-sky-700 hover:bg-sky-600 text-white font-bold py-2 px-2 rounded inline-flex items-center"
      >
        Save
      </button>
    </form>
  </div>

</template>

<script setup>
  import { ref, computed, onMounted } from 'vue';
  import { handleInvalidForm } from "../utils";
  import { useRouter } from 'vue-router';
  const router = useRouter()

  const form = ref({
    title: '',
    attractions: '',
    description: '',
    start_datetime: '',
    img_path: 'default.png',
    price: '',
  });

  const errors = ref({
    title: [],
    attractions: [],
    description: [],
    start_datetime: [],
    img_path: [],
    price: [],
  });

  const handleFileUpload = async (event) => {
    const filename = await createTemporaryFile(event.target.files[0])
    form.value.img_path = filename
  }
  async function createTemporaryFile(file) {
      let config  = {
          headers:{
            'Content-Type': 'multipart/form-data',
          }
      }
      const response = await axios.post("/api/upload-file-image", { file }, config);
      return response.data.filename
  }
  async function handleSave() {
    try {
      await axios.post("/api/show-events", form.value);
      await router.push({ path: '/' });
    } catch (err) {
      handleInvalidForm(err, errors);
    }
  }

  const getBannerDate = computed(() => form.value.start_datetime.toLocaleString().replace(/\,/g,'').slice(0, 10)) 

</script>
