<script>
    module.exports = {
        props: ['card']
    }
</script>

<template>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 offers-grid-block-tile">
        <router-link :to="{name:'card',params:{id: card.id}}" class="offers-grid-block-grid-bg">
            <img style="background-position: center; background-size: cover; height: 250px; width: 100%;"
                 :style="{ backgroundImage: `url(` + card.preview + `)` }"
                 :src="card.transparentImage" :alt="card.taxonomy"/>
        </router-link>
        <div class="offers-grid-block-grid-name">
            <router-link :to="{name:'card',params:{id: card.id}}">{{ card.taxonomy }}</router-link><br>
            <span class="price" v-html="card.priceView"></span>
        </div>
        <div class="offers-grid-block-grid-desc">
            {{ card.year }}, {{ card.volume }}, {{ card.transmission }},
            {{ card.fuel }}, {{ card.body }}, {{ card.drive }}
        </div>
    </div>
</template>
