<template>
    <div>
      <h1>Edit Catering</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <textarea v-model="form.menu" placeholder="Menu"></textarea>
        <input v-model="form.price" placeholder="Price" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    catering: Object,
  });
  
  const form = useForm({
    name: props.catering.name,
    menu: props.catering.menu,
    price: props.catering.price,
  });
  
  const submit = () => {
    form.put(`/caterings/${props.catering.id}`);
  };
  </script>