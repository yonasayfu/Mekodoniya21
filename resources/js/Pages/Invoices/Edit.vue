<template>
    <div>
      <h1>Edit Invoice</h1>
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
    invoice: Object,
    events: Array,
  });
  
  const form = useForm({
    event_id: props.invoice.event_id,
    amount: props.invoice.amount,
    date: props.invoice.date,
    status: props.invoice.status,
  });
  
  const submit = () => {
    form.put(`/invoices/${props.invoice.id}`);
  };
  </script>