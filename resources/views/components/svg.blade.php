<div class="login-wrapper" id="wrapper">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 550 450">
        <defs>
            <linearGradient id="phoneBody" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#fff" />
                <stop offset="100%" stop-color="#d8dee8" />
            </linearGradient>
            <linearGradient id="screenGrad" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#222" />
                <stop offset="100%" stop-color="#000" />
            </linearGradient>
            <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
                <feDropShadow dx="0" dy="4" stdDeviation="4" flood-color="#000" flood-opacity="0.15" />
            </filter>
        </defs>

        <g id="phoneGroup" filter="url(#shadow)" transform="translate(35,20)">
            <rect x="0" y="0" width="230" height="340" rx="28" fill="url(#phoneBody)" stroke="#c7ccd4"
                stroke-width="2" />
            <rect x="20" y="28" width="190" height="240" rx="14" fill="url(#screenGrad)" />
            <circle cx="115" cy="300" r="12" fill="#e9ecf0" stroke="#c7ccd4" stroke-width="2" />
        </g>

        <g id="face" transform="translate(35,20)">
            <circle id="leftEye" cx="90" cy="110" r="10" fill="#fff" />
            <circle id="rightEye" cx="145" cy="110" r="10" fill="#fff" />
            <path d="M90 135 Q118 155 145 135" fill="none" stroke="#fff" stroke-width="6" stroke-linecap="round" />
        </g>


        <g transform="translate(35,20)">
            <rect x="80" y="340" width="16" height="40" rx="8" fill="#222" />
            <rect x="135" y="340" width="16" height="40" rx="8" fill="#222" />
            <ellipse cx="88" cy="390" rx="22" ry="8" fill="#fff" stroke="#222"
                stroke-width="2" />
            <ellipse cx="143" cy="390" rx="22" ry="8" fill="#fff" stroke="#222"
                stroke-width="2" />
        </g>

    {{-- hands --}}

            <g id="hands" transform="translate(35,20)">
                <g id="leftHand" transform="translate(35,20)">
                    <path d="M0 150 Q-25 170 -8 185" stroke="#222" stroke-width="8" stroke-linecap="round"
                        fill="none" />
                    <circle cx="-8" cy="185" r="12" fill="#fff" stroke="#222" stroke-width="2" />
                </g>
                <g id="rightHand" transform="translate(-5,20)">
                    <path d="M230 150 Q255 170 238 185" stroke="#222" stroke-width="8" stroke-linecap="round"
                        fill="none" />
                    <circle cx="238" cy="185" r="12" fill="#fff" stroke="#222" stroke-width="2" />
                </g>
            </g>

    </svg>


</div>
