<template>
    <div>
      <h1>Edit Elder Supporter Match</h1>
      <form @submit.prevent="submit">
        <select v-model="form.elder_id">
          <option v-for="elder in elders" :key="elder.id" :value="elder.id">{{ elder.name }}</option>
        </select>
        <select v-model="form.supporter_id">
          <option v-for="supporter in supporters" :key="supporter.id" :value="supporter.id">{{ supporter.name }}</option>
        </select>
        <input v-model="form.match_date" type="date" />
        <input v-model="form.monthly_contribution_amount" placeholder="Monthly Contribution Amount" />
        <input v-model="form.support_status" placeholder="Support Status" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    match: Object,
    elders: Array,
    supporters: Array,
  });
  
  const form = useForm({
    elder_id: props.match.elder_id,
    supporter_id: props.match.supporter_id,
    match_date: props.match.match_date,
    monthly_contribution_amount: props.match.monthly_contribution_amount,
    support_status: props.match.support_status,
  });
  
  const submit = () => {
    form.put(`/elder-supporter-matches/${props.match.id}`);
  };
  </script>