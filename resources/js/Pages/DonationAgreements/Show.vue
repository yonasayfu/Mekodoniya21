<template>
    <div>
      <h1>Donation Agreement Details</h1>
      <p>Supporter: {{ agreement.supporter.name }}</p>
      <p>Full Name: {{ agreement.full_name }}</p>
      <p>Email Address: {{ agreement.email_address }}</p>
      <p>Phone Number: {{ agreement.phone_number }}</p>
      <p>Monthly Donation Amount: {{ agreement.monthly_donation_amount }}</p>
      <p>Bank Name: {{ agreement.bank_name }}</p>
      <p>Account Number: {{ agreement.account_number }}</p>
      <p>Preferred Start Date: {{ agreement.preferred_start_date }}</p>
      <p>Agreement Text: {{ agreement.agreement_text }}</p>
      <p>PDF File: {{ agreement.pdf_file }}</p>
      <Link :href="`/donation-agreements/${agreement.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    agreement: Object,
  });
  </script>