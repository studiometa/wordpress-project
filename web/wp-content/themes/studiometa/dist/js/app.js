(self.webpackChunkmodern=self.webpackChunkmodern||[]).push([[804],{133:(e,t,s)=>{var o=s(380),l=s(348),p=s(350);const i=()=>!window.location.hostname.startsWith("www.");var r={isDev:i};class a extends o.X{onPlayClick(){this.playVideo()}onVideoCoverClick(){this.playVideo()}onVideoPlayerPause(){this.pauseVideo()}playVideo(){this.$refs.videoCover.style.opacity=0,this.$refs.videoCover.style.pointerEvents="none",this.$refs.play.style.opacity=0,this.$refs.play.style.pointerEvents="none",this.$refs.videoPlayer.play()}pauseVideo(){this.$refs.videoCover.style.opacity=1,this.$refs.videoCover.style.pointerEvents="auto",this.$refs.play.style.opacity=1,this.$refs.play.style.pointerEvents="auto",this.$refs.videoPlayer.pause()}}a.config={name:"Video",refs:["play","videoPlayer","videoCover"]};class n extends o.X{mounted(){this.$log("mounted \u{1F389}")}}n.config={log:i(),name:"App",components:{Video:a,Figure:p.B}};var y=(0,l.Z)(n,document.body)}},e=>{var t=o=>e(e.s=o);e.O(0,[216],()=>t(133));var s=e.O()}]);

//# sourceMappingURL=app.js.map