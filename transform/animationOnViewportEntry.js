//alter code based on your keyframe animation name and element class
// works for all elements with the same class, triggering animation as they come onto the screen

//EXAMPLE: wipe in animation from the right

//css
@keyframes wipe-in-right {
    from {
        clip-path: inset(0 100% 0 0);
    }
    to {
        clip-path: inset(0 0 0 0);
    }
}
[transition-style="in:wipe:right"] {
    animation: 3s cubic-bezier(.25, 1, .30, 1) wipe-in-right both;
}

//js
//Add wipe in from right animation
// alter threshold number to trigger based on percent of element in viewport scale of 0 - 1
const wipeRightElements = document.querySelectorAll('.wipe-right');
const wipeRightObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle('wipe-r', entry.isIntersecting);
        $('.wipe-r').attr('transition-style', 'in:wipe:right');
        console.log(entry);
    }, { threshold: .3 });
});
wipeRightElements.forEach(wipeRightElement => {
    wipeRightObserver.observe(wipeRightElement);
})