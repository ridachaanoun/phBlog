-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 02:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ID_arti` int(11) NOT NULL,
  `Titre` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `Contenu_arti` text DEFAULT NULL,
  `subtitle` varchar(50) NOT NULL,
  `Date_created` date DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_Category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID_arti`, `Titre`, `image_path`, `Contenu_arti`, `subtitle`, `Date_created`, `ID_user`, `ID_Category`) VALUES
(13, 'Ubisoft Cancels The Division Heartland', 'blog/img/heartland-1662838213078.jpg', 'Ubisoft has canceled its upcoming free-to-play shooter, Tom Clancy\'s The Division Heartland, amid larger plans to focus resources on \"bigger opportunities.\"\r\n\r\nThis news was revealed as a part of Ubisoft\'s earnings release this morning, with the company saying it has \"redeployed resources to bigger opportunities such as XDefiant and Rainbow Six.\" The move is part of a larger, longer process Ubisoft has been undergoing in recent quarters to restructure its teams, cut costs, and concentrate its resources into fewer, bigger games.\r\n\r\nUbisoft offered the following statement on the cancellation:\r\n\r\nAfter careful consideration, we have made the tough call to halt development on Tom Clancy’s The Division Heartland, effective immediately. Our priority now is to support the talented team members at our Red Storm Entertainment studio, who will be transitioning to new projects within our company, including XDefiant and Rainbow Six.', 'The company will move resources', '2024-05-01', 3, 2),
(14, 'Decoding AI', 'blog/img/Design sans titre (27).svg', 'Hollywood screenwriters strike because they fear losing their jobs to Artificial intelligence (\"AI\"); Google\'s Med-PaLM 2 shocked the medical profession by outperforming human doctors on the US Medical License Exam; and chatbots replace customer service agents. While AI is rapidly improving and presenting new opportunities, concerns about potential disruptions loom.\r\n\r\nBut what exactly is AI, how is it used, and what implications does it hold? These questions were at the heart of a recent workshop, \"AI, Big Data and Policy,\" that brought together experts from academia, industry, and policy institutions. Here are some of the key insights:\r\n\r\nThe Mystery of AI Unraveled\r\nContrary to AI in science-fiction movies, today\'s AI is a prediction technology. It uses what we know to predict what we don\'t.  For example, in language translation, AI predicts how people would translate a text by using information on how real humans have translated texts in the past.  \r\n\r\nDecision-making involves predicting outcomes and deciding what actions to take. By shifting prediction away from humans, AI decouples the prediction and human judgment parts of decision-making. For example, AI can predict the presence of tumors in a radiology image, but the human doctor makes the judgment regarding treatment. Reorganizing firms to efficiently combine human judgment and automated prediction is where the real productivity gains lie.  \r\n\r\nMany problems can be reframed as prediction problems: writing computer code, image recognition, e-mail or chat responses, driving, etc. \"Generative AI\" can even create entirely new content, like new images or code. The potential scope of AI is huge.  ', 'A human brain trying to decode artificial intellig', '2024-05-01', 3, 1),
(27, 'The Basketball Gods Came Through And Have Given Us', 'blog/img/The Basketball Gods Came.svg', 'As fun as these playoffs has been, the one thing we\'ve needed was more Game 7s. The only one we got was from ORL/CLE, and while all Game 7s have a certain amount of juice to them, I\'m not sure that matchup scratched the itch.\r\n\r\nBut the Wolves/Nuggets? Hell yes. If we\'re lucky, this will be just the beginning and there will be more Game 7s on the horizon between DAL/OKC or NYK/IND, but if this is all we get that\'s good enough for me. I just want the drama and make no mistake, the defending champs playing a Game 7 at home against a team that in no way fears them absolutely fits the bill. I don\'t even really care that all these games in this series have been blowouts, they\'ve still been must watch. This matchup has been about as even as you can get, and the beauty of a Game 7 like this is it\'s a true toss up. Two heavyweights throwing haymakers, both sides with high end talent, two teams that have been elite all year, this is the stuff Game 7 dreams are made of.\r\n\r\nAs someone who has lived through Game 7s in every round, there\'s truly nothing like it when your team is involved. As a fan with no rooting interest, Game 7s rule. But when you\'re involved in them? They\'re the absolute worst. You freak out over every dribble, every mistake feels like it just ended your season, when things are going well you can\'t even truly enjoy it because your eyes are watching the clock the entire time while your brain is doing all sorts of scoreboard math depending on how much time is left', 'David Berding. Getty Images.', '2024-05-09', 4, 3),
(28, 'Why have emerging markets underperformed?', 'blog/img/markets underperformed.svg', 'Historically, investors have looked to emerging markets for cheaper but potentially higher risk stocks that offer the possibility of greater returns. Why is that? Well, it all rests on the promise of \'convergence\'.\r\n\r\nConvergence is the idea that incomes of citizens of emerging economies tend to grow at faster rates than those in richer, more mature economies. Much of this comes down to the potential for faster growth in manufacturing, employment, and money flow from developed markets, all factors which can support the performance of emerging market equities.\r\n\r\nConvergence also rests on the concept of diminishing returns to capital investment. This means that as an investment in a particular area increases, the rate of potential profit from that asset – up to a certain point – cannot also increase. Farmland is the classic analogy here: once you exhaust the land available in a given plot, rather than planting more seeds in the same plot, you’re best going to other plots with plenty of nutrients to increase income.\r\n\r\nThe same principle here underpins capital inflows to emerging economies. The average investor may gain better returns by investing in markets with a lower capital to labour ratio (the amount of capital available per worker), as the marginal return on capital will be higher where the ratio had a low base to begin with, compared with the amount of capital available. This should, in theory, enable EM equities to outperform their developed market peers.\r\n\r\nThis return should in theory show up in equity markets as outperformance in emerging markets versus developed markets. On balance, however, investors should require a higher return on EM assets than developed assets due to the higher risk from factors such as illiquidity (illiquid assets are harder to sell if there are fewer buyers) and currency volatility (EM currencies are generally deeply affected by strong currencies like the US dollar, and can be prone to sudden devaluation). ', 'mmm', '2024-05-09', 4, 4),
(29, 'Tax year end 2023/24: key dates for the current tax year', 'blog/img/Tax year end 202324.svg', 'Leaving yourself plenty of time to invest before the tax year end deadline means you can avoid any last-minute worries and make the most of your allowances. Some providers have complicated rules around cut-off times and contribution limits. Therefore, we recommend getting prepared, speaking to your bank if needed and contributing as soon as you can.  \r\n\r\nIf you have a Nutmeg ISA, Lifetime ISA (LISA) or Junior ISA (JISA) there are a variety of ways to contribute and invest your money in a way that works for you.  \r\n\r\nA Nutmeg pension will have different deadlines that you need to be aware of, some as early as Friday 15th March, which we’ll discuss later.  \r\n\r\nDifferent types of ISAs and pensions have specific annual allowances. Understanding these allowances means you can plan when and how you invest, which can have a big impact on the tax efficiency of your portfolio.  \r\n\r\nRead about the annual allowances in this blog, while you may also be wondering how many ISAs you can actually have.  ', 'To help you take full advantage', '2024-05-09', 4, 4),
(30, 'Climate change encourages investing for children’s future', 'blog/img/children’s future.svg', 'We carried out research with Opinium, and found that nearly two in three (64%) UK adults are now more likely to start investing on behalf of a loved one under the age of 18 than they were before the pandemic. Of those who already have a Junior ISA (JISA), 56% say they are contributing more than they were previously and will continue to do so over the next 10 years.    \r\n\r\nA third (35%) of JISA investors say the main motivation for investing more is because the pandemic has made them realise they need to plan for the future. The majority (78%) also say they are now more likely to opt for a socially responsible JISA than they were previously, with 48% of those who would opt for a socially responsible JISA saying the pandemic has encouraged them to re-evaluate their perspectives. A fifth (20%) say it is because their child or loved one has expressed an interest in climate change or a similar issue.  \r\n\r\nWe carried out the research as it has been ten years since the JISA was launched in November 2011. We wanted to see how attitudes towards saving and investing on behalf of under-18s has changed – after the Covid-19 outbreak, and in the midst of a climate crisis. \r\n\r\nPeople have become acutely aware of how important it is to build up a nest egg for the next generation, who may one day need help to fund their studies, buy a home or fulfil their dreams of travel – or all three.  ', 'We hope you enjoy this article from our archives', '2024-05-09', 4, 5),
(31, 'The Big Tech Lending Model', 'blog/img/The Big Tech Lending Model.svg', 'Big tech companies across the world have started to offer lending services in recent years, either directly or in partnership with financial institutions. In China, Alibaba, Baidu, and Tencent all offer credit services through their subsidiaries, while in the United States, Apple, Amazon, and Google also offer credit services. Aided by advantages in information, distribution, technology, and monitoring embedded in these big tech companies’ ecosystems, the global volume of big tech lending grew rapidly from $10.6 billion in 2013 to $572 billion in 2019, more than twice the volume of other types of fintech lending.\r\n\r\nIs big tech lending riskier than traditional bank lending? Is big tech lending robust to severe economic shocks that may create structural breaks in its risk assessment models? How do big tech lenders structure loans? And for what do borrowers use big tech loans? These questions represent financial regulators’ key concerns about big tech lending. We study these questions by comparing big tech business loans made by the syndication of MyBank with a large retail bank in China, Bank X hereafter, and Bank X’s regular and online business loans from August 2019 to December 2020. MyBank is a pioneer big tech lender to small and medium-size enterprises in China.\r\n\r\nWe find sharp differences between big tech lending and Bank X’s lending in many aspects. Big tech borrowers have more limited credit access and 81 percent of them obtained their first business loan from a big tech lending program . Big tech loans are mostly uncollateralized, with much smaller credit limits and loan sizes, and much higher interest rates. \r\n\r\nWe focus on uncollateralized loans in our analysis. Consistent with big tech loans’ coverage of borrowers with worse credit quality, the overall delinquency rate of big tech loans is higher than that of Bank X’s loans, as figure 1 shows. Yet, the higher delinquency rate is mainly driven by borrowers without a payback record, which accounted for nearly half of the big tech loans. Among big tech loans made to borrowers with a payback record, the delinquency rate was only 1.2 percent, very similar to that of Bank X’s loans.', 'Three-dimensional logos of tech giants:', '2024-05-09', 4, 4),
(32, 'Should I invest ethically? A guide to responsible investing', 'blog/img/A guide to responsible investing.svg', 'What is socially responsible investing (SRI)?  \r\nInvesting with a socially responsible focus means investing in companies that do business in a fair and progressive way. It means favouring companies with strong sustainability profiles, such as those that put into action environmental initiatives, or those that have sustainability goals for health, poverty, education, or equal access to resources. \r\nIt also means avoiding companies that engage in controversial activities, such as those involved in arms, fossil fuel, tobacco, or adult entertainment.  \r\nWhat is the difference between ESG investing and socially responsible investing? \r\nt providers have their individual approaches. Nutmeg has its own framework which combines leading ESG research and analytics platforms with our team’s investment expertise to construct socially responsible portfolios that remain true to the core investment principles that underpin Nutmeg’s investment philosophy. Our white paper explains our process in more detail.\r\nHow do you decide if an investment is ethical?\r\nThere are many ways to decide whether an investment is ethical. If the investment is in a company, you could try to calculate that company’s carbon footprint, look at how it treats its workers, or count how many independent directors are on its board, for example.  \r\nIntegral to Nutmeg’s ESG process is data from MSCI, a market-leading financial information provider and compiler of indices. ', 'We hope you enjoy this article from our archives', '2024-05-09', 4, 6),
(37, 'Kosovo’s digital revolution: A success story', 'blog/img/digital_kosovo.svg', 'Every day we hear about new digital technologies and the promises that come with them. The digital world can solve many problems and often does. But we often forget that billions of people have never used the internet. And why not? Because they never had access to it in the first place. Their reality is different.\r\n\r\nMost people without access to digital technologies live in developing countries where high-speed internet is a geographically localized privilege that few can afford. Those living far from cities—who are most in need of a digital lifeline—are the most disconnected. And though most countries have some kind of program to address this shortcoming, few are successful. \r\n\r\nBut Kosovo—one of Europe’s poorest countries—is an exception. In 2018, it started to implement the five-year Kosovo Digital Economy Project (KODE) with World Bank support. Its goal was simple but powerful: to ensure that Kosovars living anywhere in the country would have equal access to digital opportunities, be it for work, education, social services, or entertainment. The project has been a success—today, in 2023, nearly everyone in Kosovo uses the internet, and the number of subscribers to fixed broadband services is one of the highest in Europe. \r\n\r\nThe program attracted private sector investments in villages where previously, few ventured to invest. Now people are moving back to villages from cities because the internet is better there—an important draw during the COVID-19 pandemic. ', 'Students taking part in the Kosovo ', '2024-05-17', 3, 1),
(57, 'hhhhhhhh', 'blog/img/664a40051e9a40.99855866.png', 'Tackle the blank page\r\nWith ideas and structure delivered straight to the page you\'re already on, you’ll never miss a deadline again. Brainstorms, outlines, and new perspectives are at your fingertips so you can move from idea to draft faster.', '', '2024-05-19', 1, 1),
(58, 'test 10', 'blog/img/664b39aa25c5d9.66005286.png', 'test 10', '', '2024-05-20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID_Category` int(11) NOT NULL,
  `Categoryname` varchar(50) DEFAULT NULL,
  `ID_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID_Category`, `Categoryname`, `ID_parent`) VALUES
(1, 'digital developpement ', 1),
(2, 'Gaming', 2),
(3, 'Sport', 3),
(4, 'Market Insights', 4),
(5, 'Family Investing', 5),
(6, 'Socially Responsible', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID_comment` int(11) NOT NULL,
  `Contenu_com` text NOT NULL,
  `Date_created_com` date DEFAULT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_arti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID_comment`, `Contenu_com`, `Date_created_com`, `ID_user`, `ID_arti`) VALUES
(1, 'goo', '2024-05-19', 7, 13),
(2, 'goo', '2024-05-19', 7, 13),
(4, 'I like It \r\n', '2024-05-19', 1, 57),
(5, 'I like It \r\n', '2024-05-19', 1, 57),
(6, 'good', '2024-05-19', 7, 14),
(8, 'good', NULL, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `Id_likes` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_arti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`Id_likes`, `ID_user`, `ID_arti`) VALUES
(2, 7, 13),
(3, 7, 37),
(4, 7, 31),
(6, 7, 14);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID_role` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_role`, `role_name`) VALUES
(1, 'super_admin'),
(2, 'admin'),
(3, 'user'),
(5, ''),
(6, 'uuuser');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `ID_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_user`, `username`, `Email`, `pass_word`, `ID_role`) VALUES
(1, 'marwa benharda', 'marwa123@gmail.com', 'marwa@123', 1),
(2, 'reda', 'reda@gmail.com', 'reda', 3),
(3, 'hanane', 'hanane@gmail.com', 'marwa@123', 3),
(4, 'hafsa', 'hafsa@gmail.com', 'hafsa', 3),
(7, 'ridachaanoun1', 'ridachaanoun.ff.2@gmail.com', 'ridachaanoun.ff.2@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_arti`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_Category` (`ID_Category`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_Category`),
  ADD KEY `ID_sapCategory` (`ID_parent`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_arti` (`ID_arti`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Id_likes`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_arti` (`ID_arti`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `ID_role` (`ID_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_arti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `Id_likes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`ID_Category`) REFERENCES `categories` (`ID_Category`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`ID_parent`) REFERENCES `categories` (`ID_Category`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ID_arti`) REFERENCES `articles` (`ID_arti`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`ID_arti`) REFERENCES `articles` (`ID_arti`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_role`) REFERENCES `roles` (`ID_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
