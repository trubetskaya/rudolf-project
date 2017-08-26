<script>
    module.exports = {
        props: ['card']
    }
</script>

<template>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 offers-grid-block-tile">
        <a :href="card.link" class="offers-grid-block-grid-bg">
            <img style="background-position: center; background-size: cover; height: 250px; width: 100%;"
                 :style="{ backgroundImage: `url(` + card.preview + `)` }"
                 :src="card.transparentImage" :alt="card.taxonomy"/>
        </a>
        <div :href="card.link" class="offers-grid-block-grid-name">
            <a :href="card.link">{{ card.taxonomy }}</a><br>
            <span class="price" v-html="card.priceView"></span>
        </div>
        <div class="offers-grid-block-grid-desc">
            {{ card.year }}, {{ card.volume }}, {{ card.transmission.name }},
            {{ card.fuel.name }}, {{ card.body.name }}, {{ card.drive.name }}
        </div>
    </div>
</template>
