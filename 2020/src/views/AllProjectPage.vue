<template>
  <div class="all-project-page">
    <div class="project-frame" v-for="project in projects" :key="project.year">
      <p class="project-title">{{ project.year }}</p>
      <router-link class="project-link" v-for="(projectNumber, ind) in project.numbers" :key="ind" :to="{ name: project.year + '-' + projectNumber }">
        {{ project.year + '-' + projectNumber }}
      </router-link>
    </div>

  </div>
</template>

<script>
import projects from '@/assets/data/projects.js'
export default {
  data: function() {
    return {
      projects: projects
    }
  }
}
</script>

<style lang="scss">
.all-project-page {
  text-align: center;
  & .project-frame {
    & .project-title {
      font-weight: bold;
    }
    & .project-link {
      display: block;
      margin: 0 35vw 0 35vw;
      text-decoration: none;
    }
  }
}
</style>