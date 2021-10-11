<template>
  <div>
    <router-link v-for="(projectName, index) in projectNameList" :key="index" :to="{ name: projectName }">{{ projectName }}</router-link>
  </div>
</template>

<script>
import projectNameList from '@/assets/data/projects.js'
export default {
  data: function() {
    return {
      projectNameList: projectNameList
    }
  }
}
</script>

<style>

</style>