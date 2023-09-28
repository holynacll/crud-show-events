<template>
  <div>
    <form class="space-y-6" @submit.prevent="handleSave()">
      <div class="space-y-4 rounded-md shadow-sm">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <div class="mt-1">
          <input v-model="form.title" type="text" name="title" id="title" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          <p class="text-red-600 p-1" v-for="error in errors.title">{{ error }}</p>
        </div>
      </div>
      <button type="submit" class="inline-flex items-center px-4 py-2 font-semibold">Save</button>
    </form>
  </div>
</template>

<script setup>
  import { ref } from 'vue';
  import { handleInvalidForm } from "../utils";

  const form = ref({
    title: '',
    attractions: '',
    description: '',
    start_date: '',
    img_path: '',
    price: '',
  });

  const errors = ref({
    title: [],
    attractions: [],
    description: [],
    start_date: [],
    img_path: [],
    price: [],
  });

  async function handleSave() {
    try {
      await axios.post("/show-events", form.value);
      useRouter().push("/");
    } catch (err) {
      handleInvalidForm(err, errors);
    }
  }
</script>
