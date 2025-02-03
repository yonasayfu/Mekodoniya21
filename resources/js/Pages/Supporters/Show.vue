<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Supporter Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-lg font-semibold mb-2">Basic Information</h2>
        <p>Name: {{ supporter.name }}</p>
        <p>Age: {{ supporter.age }}</p>
        <p>Gender: {{ supporter.gender }}</p>
        <p>Address: {{ supporter.address }}</p>
        <p>Phone Number: {{ supporter.phone_number }}</p>
        <p>Email: {{ supporter.email }}</p>
        <p>Support Type: {{ supporter.support_type }}</p>
        <p>Contribution Amount: ${{ supporter.contribution_amount }}</p>
        <p>Commit Duration: {{ supporter.commit_duration }} months</p>
        <p>Start Date: {{ supporter.start_date }}</p>
        <p>Bank Details: {{ supporter.bank_details }}</p>
        <p>Visitation Preference: {{ supporter.visitation_preference }}</p>
        <div class="mt-6">
          <h3 class="text-xl font-semibold mb-4">Donations</h3>
          <div v-for="donation in supporter.donations" :key="donation.id" class="mb-2">
            <p>Amount: ${{ donation.amount }}, Date: {{ donation.date }}</p>
           </div>
        </div>
        <div class="mt-6">
          <h3 class="text-xl font-semibold mb-4">Visit Logs</h3>
          <div v-for="visitLog in supporter.visitLogs" :key="visitLog.id" class="mb-2">
            <p>Date: {{ visitLog.visit_date }}, Purpose: {{ visitLog.visit_purpose }}</p>
         </div>
       </div>
      <div class="mt-6">
        <h3 class="text-xl font-semibold mb-4">Elder Matches</h3>
        <div v-for="match in supporter.elderSupporterMatches" :key="match.id" class="mb-2">
          <p>Elder: {{ match.elder.name }}, Match Date: {{ match.match_date }}</p>
         </div>
      </div>
      <div class="mt-6">
          <h3 class="text-xl font-semibold mb-4">Donation Agreements</h3>
          <div v-for="agreement in supporter.donationAgreements" :key="agreement.id" class="mb-2">
            <p>Monthly Amount: ${{ agreement.monthly_donation_amount }}</p>
           </div>
        </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
    supporter: Object,
});
</script>