// original

// worse case scenario
const worseCaseScenario = '1234567890';
const averageCaseScenario = '12345X6789';
const bestCaseScenario = 'X123456789';

function containsX(string) {
	foundX = false;
	steps = 0;
	for (let i = 0; i < string.length; i++) {
		steps++;
		if (string[i] === "X") {
			foundX = true;
		}
	}
	console.log(steps);

	return foundX;
}

console.log('ORIGINAL');
console.log(containsX(worseCaseScenario));
console.log(containsX(averageCaseScenario));
console.log(containsX(bestCaseScenario));
console.log('');

function containsXImproved(string) {
	steps = 0;
	for (let i = 0; i < string.length; i++) {
		steps++;
		if (string[i] === "X") {
			console.log(steps);
			return true; 
		}
	}

	console.log(steps);
	return false;
}

console.log('ANSWER/IMPROVED');
console.log(containsXImproved(worseCaseScenario));
console.log(containsXImproved(averageCaseScenario));
console.log(containsXImproved(bestCaseScenario));
