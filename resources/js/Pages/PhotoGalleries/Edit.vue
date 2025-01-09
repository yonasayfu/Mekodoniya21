<template>
    <div>
      <h1>Edit Photo Gallery</h1>
      <form @submit.prevent="submit">
        <select v-model="form.event_id">
          <option v-for="event in events" :key="event.id" :value="event.id">{{ event.name }}</option>
        </select>
        <input v-model="form.photo_url" placeholder="Photo URL" />
        <textarea v-model="form.description" placeholder="Description"></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    photoGallery: Object,
    events: Array,
  });
  
  const form = useForm({
    event_id: props.photoGallery.event_id,
    photo_url: props.photoGallery.photo_url,
    description: props.photoGallery.description,
  });
  
  const submit = () => {
    form.put(`/photo-galleries/${props.photoGallery.id}`);
  };
  </script>