<?php
	use Framework\DomainObject;
	    class StreamsObject implements DomainObject {
        private $streamName;
        private $streamImage;
        private $instructorName;

        function __construct($sn, $sim, $in) {
            $this->streamName = $sn;
            $this->streamImage = $sim;
            $this->instructorName = $in;
        }

        public function getStreamName() {
            return $this->streamName;
        }

        public function getStreamImage() {
            return $this->streamImage;
        }

        public function getInstructorName() {
            return $this->instructorName;
        }
    }
?>
?>