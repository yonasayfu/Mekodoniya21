<template>
    <div>
      <h1>Edit Setting</h1>
      <form @submit.prevent="submit">
        <input v-model="form.key" placeholder="Key" />
        <input v-model="form.value" placeholder="Value" />
        <textarea v-model="form.description" placeholder="Description"></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    setting: Object,
  });
  
  const form = useForm({
    key: props.setting.key,
    value: props.setting.value,
    description: props.setting.description,
  });
  
  const submit = () => {
    form.put(`/settings/${props.setting.id}`);
  };
  </script>