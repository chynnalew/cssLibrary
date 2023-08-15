//alter code based on your keyframe animation name and element class
// works for all elements with the same class, triggering animation as they come onto the screen

//EXAMPLE: wipe in animation from the left

//css
@keyframes wipe-in-left {
    from {
        clip-path: inset(0 100% 0 0);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}
[transition-style="in:wipe:left"] {
    animation: 3s cubic-bezier(.25, 1, .30, 1) wipe-in-left both;
}

//js
//Add wipe in from left animation
// alter threshold number to trigger based on percent of element in viewport scale of 0 - 1
const wipeLeftElements = document.querySelectorAll('.wipe-left');
const wipeLeftObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle('wipe-l', entry.isIntersecting);
        $('.wipe-l').attr('transition-style', 'in:wipe:left');
        console.log(entry);
    }, { threshold: .3 });
});
wipeLeftElements.forEach(wipeLeftElement => {
    wipeLeftObserver.observe(wipeLeftElement);
})