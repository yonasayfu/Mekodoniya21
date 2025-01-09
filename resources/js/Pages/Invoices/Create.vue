<template>
    <div>
      <h1>Create Invoice</h1>
      <form @submit.prevent="submit">
        <select v-model="form.event_id">
          <option v-for="event in events" :key="event.id" :value="event.id">{{ event.name }}</option>
        </select>
        <input v-model="form.amount" placeholder="Amount" />
        <input v-model="form.date" type="date" />
        <input v-model="form.status" placeholder="Status" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    events: Array,
  });
  
  const form = useForm({
    event_id: '',
    amount: '',
    date: '',
    status: '',
  });
  
  const submit = () => {
    form.post('/invoices');
  };
  </script>